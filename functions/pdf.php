<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.10.377/pdf.min.js"></script>

</head>
<body>
<?php
if (isset($_GET["pdf"])) {
    $pdf = $_GET['pdf'];
}
?>
<div id="pdfViewer">
</div>

<script>
const pdfUrl = '../notes/<?php echo $pdf; ?>';

const renderPdf = async () => {
    const pdfContainer = document.getElementById('pdfViewer');

    const loadingTask = pdfjsLib.getDocument(pdfUrl);

    try {
        const pdf = await loadingTask.promise;

        for (let pageNumber = 1; pageNumber <= pdf.numPages; pageNumber++) {
            const page = await pdf.getPage(pageNumber);
            const scale = 1.5;
            const viewport = page.getViewport({ scale });

            const canvas = document.createElement('canvas');
            const context = canvas.getContext('2d');
            canvas.height = viewport.height;
            canvas.width = viewport.width;

            const renderContext = {
                canvasContext: context,
                viewport: viewport
            };

            await page.render(renderContext).promise;
            pdfContainer.appendChild(canvas);
        }
    } catch (error) {
        console.error('Error rendering PDF:', error);
    }
};

renderPdf();

</script>

</body>
</html>