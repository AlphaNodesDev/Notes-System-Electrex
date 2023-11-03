<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
if (isset($_GET["pdf"])) {
    $pdf = $_GET['pdf'];
}
?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.10.377/pdf.min.js"></script>
<div id="pdf-viewer">
    <button id="zoom-in">Zoom In</button>
    <button id="zoom-out">Zoom Out</button>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const pdfViewer = document.getElementById('pdf-viewer');
    const zoomInButton = document.getElementById('zoom-in');
    const zoomOutButton = document.getElementById('zoom-out');

    let scale = 1; // Initial scale value

    const renderPDF = function () {
        pdfViewer.innerHTML = '';

        const fileName = "<?php echo $pdf; ?>"; // Get the value from PHP $pdf variable

        pdfjsLib.getDocument(`../notes/${fileName}`).promise.then(pdf => {
            pdf.getPage(1).then(page => {
                const viewport = page.getViewport({ scale });

                const maxWidth = pdfViewer.clientWidth;
                scale = maxWidth / viewport.width;

                const scaledViewport = page.getViewport({ scale });

                const canvas = document.createElement('canvas');
                const context = canvas.getContext('2d', { alpha: false }); // Disable alpha for better performance

                canvas.height = scaledViewport.height;
                canvas.width = scaledViewport.width;

                pdfViewer.appendChild(canvas);

                page.render({
                    canvasContext: context,
                    viewport: scaledViewport,
                    renderInteractiveForms: true, // Improve rendering quality for interactive forms
                    intent: 'print' // Optimizes for printing
                });
            });
        });
    };

    const changeScale = function (newScale) {
        scale += newScale;
        if (scale < 0.1) {
            scale = 0.1;
        }
        renderPDF();
    };

    zoomInButton.addEventListener('click', () => {
        changeScale(0.1);
    });

    zoomOutButton.addEventListener('click', () => {
        changeScale(-0.1);
    });

    window.addEventListener('resize', renderPDF);

    renderPDF();
});
</script>

</body>
</html>