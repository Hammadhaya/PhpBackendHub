<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Video Downloader</title>
    <link rel="stylesheet" href="<?= base_url() ?>asset/style.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  
</head>
<body>
    <!-- Header -->
    <header style="height: 50px;display:flex;">
        <div style="display: flex;align-items: center;">
            <img src="<?=base_url()?>asset/logo" alt="" style="height:175;width:173px">
        </div>
        <div style="display: flex;margin-left: 800px;">
            <nav>
                <a href="https://www.tiktok.com" target="_blank">TikTok</a>
                <a href="https://www.instagram.com" target="_blank">Instagram</a>
                <a href="https://www.snapchat.com" target="_blank">Snapchat</a>
                <a href="https://www.twitter.com" target="_blank">Twitter</a>
                <a href="https://www.youtube.com" target="_blank">YouTube</a>
            </nav>
        </div>
    </header>

    <!-- Banner -->
    <section class="banner">
        <h1>Download Your Favorite Media</h1>
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
        <form action="<?php echo site_url('videodownloader/get_video_info'); ?>" method="post">
            <input type="text" id="video_url" name="video_url" class="form-control" placeholder="Enter video URL" required>
            <button type="submit" class="btn btn-primary">Click To Download</button>
        </form>
    </section>

    <!-- Video Section -->
    <section class="videos" id="videos">
        <h2>Downloaded Videos</h2>
        <div class="video-item">
            <video width="320" height="240" controls>
                <source src="movie.mp4" type="video/mp4">
                Your browser does not support the video tag.
            </video>
            <p>This is a video description. It provides a brief explanation of the video content.</p>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="faq" id="faq">
        <h2>Frequently Asked Questions</h2>
        <div class="faq-item">
            <p>Q1: How can I download videos?</p>
        </div>
        <div class="faq-item">
            <p>Q2: What formats are supported?</p>
        </div>
        <div class="faq-item">
            <p>Q3: Is there a limit on the number of downloads?</p>
        </div>
        <div class="faq-item">
            <p>Q4: Are there any subscription fees?</p>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 Media Downloader. All rights reserved.</p>
    </footer>

    <script src="script.js"></script>
</body>
</html>
