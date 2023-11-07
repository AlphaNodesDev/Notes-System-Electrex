<?php include("./functions/db.php");
include('./functions/session_check.php');
include('./includes/head.php');
?>
<body onload="hide_forms()">

    <main>
   
    <div class="profile-card">
        <div class="card-header">
            <img src="./assets/img/developer.jpg" alt="Abhiram">
            <div class="header-text">
                <h2>Abhiram</h2>
                <p>Front End Developer</p>
                <p>Back End Developer</p>
                <a href="https://github.com/AlphaNodesDev?tab=repositories" class="git-hub"><i class="fab fa-github"></i>
 Git Hub</a>
            </div>
        </div>
    </div>
    <div class="profile-card-2">
    <div class="card-body">
            <h3>Project Details</h3>
            <ul>
                <li><strong>Project:</strong>  Electrex Notes System</li>
                <li><strong>Version:</strong><a id="version" href="https://github.com/AlphaNodesDev/Notes-System-Electrex/releases" style="color: green;
    font-weight: 900;
    text-decoration: none;"></a></li>
                <li><strong>Details:</strong>  Notes ManageMent System</li>
            </ul>
        </div>
    </div>
    <div class="profile-card-2">
    <div class="card-body">
            <h3>Electrex App Version History</h3>
            <div class="table-container">
    <table id="releaseTable">
        <tr>
            <th>Release</th>
            <th>Version</th>
            <th>Fix</th>
            <th>Apk</th>
        </tr>
        <!-- Add your table rows dynamically using JavaScript -->
    </table>
</div>


        </div>
    </div>
</main>

<script>
    fetch('https://api.github.com/repos/AlphaNodesDev/Notes-System-Electrex/releases')
    .then(response => response.json())
    .then(data => {
        const releaseTable = document.getElementById('releaseTable');

        data.forEach(release => {
            const row = releaseTable.insertRow();

            row.insertCell().textContent = `#${release.id}`;

            const versionCell = row.insertCell();
            const versionLink = document.createElement('a');
            versionLink.href = release.html_url;
            versionLink.textContent = release.tag_name;
            versionLink.className = 'version';
            versionCell.appendChild(versionLink);

            const fixCell = row.insertCell();
            fixCell.textContent = release.body;

            const downloadCell = row.insertCell();
            if (release.assets.length > 0) {
                const downloadButton = document.createElement('button');
                downloadButton.textContent = 'Download';
                downloadButton.className = 'download-button'; 
                downloadButton.onclick = function() {
                    const apkDownloadLink = release.assets.find(asset => asset.name.endsWith('.apk'));
                    if (apkDownloadLink) {
                        window.location.href = apkDownloadLink.browser_download_url;
                    } else {
                        alert('APK file not found for this release.');
                    }
                };
                downloadCell.appendChild(downloadButton);
            }
        });
    })
    .catch(error => {
        console.error('Error fetching data:', error);
    });


</script>
<style>
        td {
            max-width: 50px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            cursor: pointer;
        }

        .tooltip {
            display: none;
            position: absolute;
            padding: 10px;
            background-color: white;
            border: 1px solid black;
            z-index: 9999;
        }
        .table-container {
        overflow-x: auto; /* Enable horizontal scrolling */
    }

    table {
        min-width: 100%; /* Ensure the table fills its container width */
    }

    /* Adjustments for mobile view */
    @media only screen and (max-width: 600px) {
        table {
            width: 1000px; /* Example width for each table row */
        }
    }
.git-hub{
    background-color: #333;
    color: white;
    border-radius: 5px;
    font-weight: 800;
    text-decoration: none;
    margin: 20px;
    border: 12px;
    padding: 10px;
}
.git-hub:hover{
    background-color: #777;

}
button.download-button {
    padding: 13px 6px;
    background-color: #4CAF50;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 14px;
    transition: background-color 0.3s;
}
/* Button hover effect */
button.download-button:hover {
    background-color: #45a049;
}
.version{
    text-decoration: none;
    color: yellow;
    font-weight: 800;
}

.version-latest{
    text-decoration: none;
    color: lightgreen;
    font-weight: 800;
}
table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            padding: 1px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
            color: black;
     
        }
 /* Basic card layout */
.profile-card {
    width: 300px;
    background-color: #333;
    margin: 20px auto;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease;
}

.profile-card:hover {
    transform: translateY(-5px);
}
 /* Basic card layout */
 .profile-card-2 {
    width: 100%;
    background-color: #333;
    margin: 20px auto;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease;
}

.profile-card-2:hover {
    transform: translateY(-5px);
}

/* Card header */
.card-header {
    background: #f9f9f9;
    padding: 20px;
    display: flex;
    border-radius: 12px;
    align-items: center;
}

.card-header img {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    margin-right: 15px;
}

.header-text {
    flex: 1;
}

.header-text h2 {
    margin: 0;
    font-size: 1.2em;
}

/* Card body */
.card-body {
    padding: 20px;
    background: #333;
    color: white;
}

.card-body h3 {
    margin-top: 0;
    font-size: 1.1em;
    color: wheat;
    border-bottom: 1px solid #ccc;
    padding-bottom: 5px;
}

.card-body ul {
    list-style: none;
    padding: 0;
    margin: 10px 0;
}

.card-body li {
    margin-bottom: 5px;
    color: #666;
}


</style>

    <?php include('./includes/footer.php');?>

</body>
</html>
