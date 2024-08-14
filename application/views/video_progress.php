<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Downloading...</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>
<body>
    <div class="container mt-5">
        <h1>Downloading...</h1>
        <div class="progress">
            <div class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        <pre id="download-output" class="mt-3"></pre>
        <a href="<?php echo site_url('videodownloader'); ?>" class="btn btn-secondary mt-3">Back</a>
    </div>

    <script>
        $(document).ready(function () {
            startDownload();

            function startDownload() {
                $.ajax({
                    url: '<?php echo site_url('videodownloader/start_download'); ?>',
                    type: 'POST',
                    xhr: function () {
                        var xhr = new window.XMLHttpRequest();
                        xhr.addEventListener('progress', function (evt) {
                            if (evt.lengthComputable) {
                                var percentComplete = evt.loaded / evt.total * 100;
                                $('.progress-bar').css('width', percentComplete + '%').attr('aria-valuenow', percentComplete);
                            }
                        }, false);
                        return xhr;
                    },
                    success: function (response) {
                        $('#download-output').text(response);
                        $('.progress-bar').css('width', '100%').attr('aria-valuenow', '100');
                    }
                });
            }
        });
    </script>
</body>
</html>
