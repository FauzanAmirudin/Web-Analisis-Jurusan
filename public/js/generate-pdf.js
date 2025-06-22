/**
 * Generate Test Result PDF using html2canvas + jsPDF
 */

function generateTestResultPDF(resultId) {
  // Show loading spinner
  document.getElementById("pdfLoadingSpinner").classList.remove("hidden");

  // First, load the full test result view in a hidden container
  loadResultDetail(resultId)
    .then((resultHtml) => {
      // Create hidden container
      const container = document.createElement("div");
      container.innerHTML = resultHtml;
      container.style.position = "absolute";
      container.style.left = "-9999px";
      container.style.top = "-9999px";
      container.style.width = "1000px"; // Fixed width for better rendering
      document.body.appendChild(container);

      // Get only the content part (not the navigation/sidebar)
      const contentElement = container.querySelector(".container");
      if (!contentElement) {
        alert("Tidak dapat memuat konten hasil tes");
        document.getElementById("pdfLoadingSpinner").classList.add("hidden");
        return;
      }

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

      // Wait a bit for fonts and images to load
      setTimeout(() => {
        // Scale down for PDF
        const scale = 2; // Higher scale for better quality
        const pdfWidth = 210; // A4 width in mm
        const pdfHeight = 297; // A4 height in mm

        // Use html2canvas to capture the element
        html2canvas(contentElement, {
          scale: scale,
          useCORS: true,
          logging: false,
          allowTaint: true,
        })
          .then((canvas) => {
            const imgData = canvas.toDataURL("image/jpeg", 1.0);
            const imgWidth = pdfWidth;
            const imgHeight = (canvas.height * imgWidth) / canvas.width;

            // Create PDF
            const { jsPDF } = window.jspdf;
            const pdf = new jsPDF("p", "mm", "a4");

            // Calculate how many pages we need
            let heightLeft = imgHeight;
            let position = 0;
            let page = 1;

            // First page
            pdf.addImage(imgData, "JPEG", 0, position, imgWidth, imgHeight);
            heightLeft -= pdfHeight;

            // Add more pages if needed
            while (heightLeft > 0) {
              position = -pdfHeight * page;
              pdf.addPage();
              pdf.addImage(imgData, "JPEG", 0, position, imgWidth, imgHeight);
              heightLeft -= pdfHeight;
              page++;
            }

            // Save PDF
            pdf.save(
              `Hasil_Tes_Analisis_Jurusan_${new Date()
                .toISOString()
                .slice(0, 10)}.pdf`
            );

            // Remove the temporary container
            document.body.removeChild(container);
            document
              .getElementById("pdfLoadingSpinner")
              .classList.add("hidden");
          })
          .catch((error) => {
            console.error("Error creating PDF:", error);
            alert("Terjadi kesalahan saat membuat PDF");
            document
              .getElementById("pdfLoadingSpinner")
              .classList.add("hidden");
            document.body.removeChild(container);
          });
      }, 1000); // Wait 1 second for rendering
    })
    .catch((error) => {
      console.error("Error loading result detail:", error);
      alert("Terjadi kesalahan saat memuat detail hasil tes");
      document.getElementById("pdfLoadingSpinner").classList.add("hidden");
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

// For backward compatibility with existing code
function prepareAndGeneratePDF(resultId) {
  generateTestResultPDF(resultId);
}
