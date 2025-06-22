/**
 * Generate Test Result PDF using html2canvas + jsPDF
 */

function generateTestResultPDF(resultId) {
  console.log("Starting PDF generation for result ID:", resultId);

  // Detect mobile device
  const isMobile =
    /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(
      navigator.userAgent
    );
  console.log("Is mobile device:", isMobile);

  // Show loading spinner - check for both possible spinner IDs
  const spinner = document.getElementById("pdfLoadingSpinner");
  if (spinner) {
    spinner.classList.remove("hidden");
    console.log("Loading spinner displayed");
  } else {
    console.warn("Loading spinner element not found");
  }

  // First, load the full test result view in a hidden container
  loadResultDetail(resultId)
    .then((resultHtml) => {
      console.log("Result HTML loaded successfully");

      try {
        // Create hidden container
        const container = document.createElement("div");
        container.innerHTML = resultHtml;
        container.style.position = "absolute";
        container.style.left = "-9999px";
        container.style.top = "-9999px";

        // Adjust width based on device
        container.style.width = isMobile ? "800px" : "1000px";
        document.body.appendChild(container);
        console.log(
          "Hidden container created with width:",
          container.style.width
        );

        // Get only the content part (not the navigation/sidebar)
        const contentElement = container.querySelector(".container");
        if (!contentElement) {
          console.error("Content element not found in the loaded HTML");
          alert("Tidak dapat memuat konten hasil tes");
          hideLoadingSpinner();
          return;
        }
        console.log("Content element found");

        // Add branding footer for PDF
        const footer = document.createElement("div");
        footer.style.textAlign = "center";
        footer.style.marginTop = "20px";
        footer.style.padding = "10px 0";
        footer.style.borderTop = "1px solid #e5e7eb";
        footer.style.fontSize = "12px";
        footer.style.color = "#6b7280";
        footer.innerHTML = `© ${new Date().getFullYear()} Analisis Jurusan - Dibuat pada ${new Date().toLocaleDateString(
          "id-ID",
          { day: "2-digit", month: "long", year: "numeric" }
        )}`;
        contentElement.appendChild(footer);
        console.log("Footer added");

        // Wait a bit for fonts and images to load - longer for mobile
        const renderDelay = isMobile ? 2000 : 1000;
        console.log(`Waiting ${renderDelay}ms for rendering...`);

        setTimeout(() => {
          // Adjust scale based on device
          const scale = isMobile ? 1.5 : 2; // Lower scale for mobile to avoid memory issues
          const pdfWidth = 210; // A4 width in mm
          const pdfHeight = 297; // A4 height in mm

          console.log("Starting html2canvas with scale:", scale);

          // Use html2canvas with optimized settings for mobile
          html2canvas(contentElement, {
            scale: scale,
            useCORS: true,
            logging: true, // Enable logging for debugging
            allowTaint: true,
            imageTimeout: 15000, // Longer timeout for mobile
            removeContainer: false, // Don't remove the container to avoid errors
          })
            .then((canvas) => {
              console.log(
                "Canvas created successfully, dimensions:",
                canvas.width,
                "x",
                canvas.height
              );

              try {
                // Convert to image with lower quality on mobile to reduce size
                const imgQuality = isMobile ? 0.8 : 1.0;
                const imgData = canvas.toDataURL("image/jpeg", imgQuality);
                console.log("Canvas converted to image data");

                // Create PDF with error handling
                if (!window.jspdf || !window.jspdf.jsPDF) {
                  throw new Error("jsPDF library not loaded properly");
                }

                const { jsPDF } = window.jspdf;
                const pdf = new jsPDF("p", "mm", "a4");
                console.log("PDF object created");

                const imgWidth = pdfWidth;
                const imgHeight = (canvas.height * imgWidth) / canvas.width;
                console.log(
                  "Image dimensions for PDF:",
                  imgWidth,
                  "x",
                  imgHeight
                );

                // Calculate how many pages we need
                let heightLeft = imgHeight;
                let position = 0;
                let page = 1;

                // First page
                console.log("Adding first page to PDF");
                pdf.addImage(imgData, "JPEG", 0, position, imgWidth, imgHeight);
                heightLeft -= pdfHeight;

                // Add more pages if needed
                while (heightLeft > 0) {
                  position = -pdfHeight * page;
                  pdf.addPage();
                  pdf.addImage(
                    imgData,
                    "JPEG",
                    0,
                    position,
                    imgWidth,
                    imgHeight
                  );
                  heightLeft -= pdfHeight;
                  page++;
                  console.log("Added page", page, "to PDF");
                }

                // Generate filename
                const filename = `Hasil_Tes_Analisis_Jurusan_${new Date()
                  .toISOString()
                  .slice(0, 10)}.pdf`;
                console.log("Saving PDF with filename:", filename);

                // Save PDF
                pdf.save(filename);
                console.log("PDF saved successfully");

                // Clean up
                document.body.removeChild(container);
                hideLoadingSpinner();
                console.log("PDF generation completed successfully");
              } catch (pdfError) {
                console.error("Error creating PDF from canvas:", pdfError);
                alert(
                  "Terjadi kesalahan saat membuat PDF. Silakan coba di perangkat desktop."
                );
                hideLoadingSpinner();
                document.body.removeChild(container);
              }
            })
            .catch((canvasError) => {
              console.error("Error creating canvas:", canvasError);
              alert(
                "Terjadi kesalahan saat membuat PDF. Silakan coba di perangkat desktop."
              );
              hideLoadingSpinner();
              document.body.removeChild(container);
            });
        }, renderDelay);
      } catch (containerError) {
        console.error("Error setting up container:", containerError);
        alert(
          "Terjadi kesalahan saat menyiapkan PDF. Silakan coba di perangkat desktop."
        );
        hideLoadingSpinner();
      }
    })
    .catch((loadError) => {
      console.error("Error loading result detail:", loadError);
      alert(
        "Terjadi kesalahan saat memuat detail hasil tes. Silakan coba lagi nanti."
      );
      hideLoadingSpinner();
    });
}

// Function to load result detail HTML
async function loadResultDetail(resultId) {
  try {
    // Fetch the HTML of the result detail page
    const response = await fetch(`/dashboard/history/${resultId}?pdf=true`);
    if (!response.ok) {
      throw new Error("Failed to load result detail");
    }
    return await response.text();
  } catch (error) {
    console.error("Error:", error);
    throw error;
  }
}

// Helper function to hide loading spinner
function hideLoadingSpinner() {
  const spinner = document.getElementById("pdfLoadingSpinner");
  if (spinner) {
    spinner.classList.add("hidden");
  }
}

// For backward compatibility with existing code
function prepareAndGeneratePDF(resultId) {
  generateTestResultPDF(resultId);
}
