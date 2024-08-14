<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Video Info</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>
<body>
    <div class="container mt-5">
        <h1>Video Info</h1>
        <?php if ($this->session->flashdata('error')): ?>
            <div class="alert alert-danger">
                <?php echo $this->session->flashdata('error'); ?>
            </div>
        <?php endif; ?>
        <?php if ($this->session->flashdata('success')): ?>
            <div class="alert alert-success">
                <?php echo $this->session->flashdata('success'); ?>
            </div>
        <?php endif; ?>
        <pre><?php echo htmlspecialchars($video_info); ?></pre>

        <form id="download-form" action="<?php echo site_url('videodownloader/download_video'); ?>" method="post">
            <input type="hidden" name="video_url" value="<?php echo urlencode($video_url); ?>">
            <div class="form-group">
                <label for="format_id">Choose Format ID:</label>
                <input type="text" id="format_id" name="format_id" class="form-control" placeholder="Enter format ID" required>
            </div>
            <button type="submit" class="btn btn-primary">Download</button>
        </form>

        <!-- Progress bar -->
        <div class="progress mt-3" style="display: none;">
            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: 0%"></div>
        </div>

        <a href="<?php echo site_url('videodownloader'); ?>" class="btn btn-secondary mt-3">Back</a>
    </div>

    <script>
        $(document).ready(function() {
            $('#download-form').on('submit', function(event) {
                event.preventDefault();

                var form = $(this);
                var url = form.attr('action');

                $.ajax({
                    xhr: function() {
                        var xhr = new XMLHttpRequest();
                        xhr.open('POST', url, true);

                        xhr.upload.addEventListener('progress', function(e) {
                            if (e.lengthComputable) {
                                var percentComplete = (e.loaded / e.total) * 100;
                                $('.progress').show();
                                $('.progress-bar').width(percentComplete + '%');
                            }
                        });

                        xhr.upload.addEventListener('load', function() {
                            $('.progress-bar').width('100%');
                        });

                        return xhr;
                    },
                    type: 'POST',
                    data: form.serialize(),
                    success: function(response) {
                        // handle success response
                    },
                    error: function(response) {
                        // handle error response
                    }
                });
            });
        });
    </script>
</body>
</html>
