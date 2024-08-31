<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['uploadfile'])) {
    $uploadfile = $_FILES['uploadfile'];
    $upload_dir = 'uploads/';

    // Check if the uploads directory exists, if not, create it
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0777, true); // Create the directory with full permissions
    }

    $temp_image_path = $upload_dir . basename($uploadfile['name']);

    // Move the uploaded file to the uploads directory
    if (move_uploaded_file($uploadfile['tmp_name'], $temp_image_path)) {
        // Call the Python script to process the image
        $command = escapeshellcmd("python test.py {$temp_image_path}");
        $output = shell_exec($command);

        // Decode the JSON output from the Python script
        $data = json_decode($output, true);

        // Function to clean and get the first line of text
        function clean_text($text) {
            // Remove any \r\n or \n characters and split by lines
            $lines = preg_split('/\r\n|\r|\n/', $text);
            // Return the first line after trimming any leading/trailing spaces
            return trim($lines[0]);
        }

        // Clean each field in the response
        if (isset($data['id_number'])) {
            $data['id_number'] = clean_text($data['id_number']);
        }
        if (isset($data['last_name'])) {
            $data['last_name'] = clean_text($data['last_name']);
        }
        if (isset($data['given_name'])) {
            $data['given_name'] = clean_text($data['given_name']);
        }
        if (isset($data['dob'])) {
            $data['dob'] = clean_text($data['dob']);
        }
        if (isset($data['address'])) {
            $data['address'] = clean_text($data['address']);
        }
        if (isset($data['middle_name'])) {
            $data['middle_name'] = clean_text($data['middle_name']);
        }

        // Return the cleaned JSON output
        echo json_encode($data);

        // Optionally, delete the temporary image after processing
        unlink($temp_image_path);
    } else {
        echo json_encode(["error" => "Failed to move uploaded file"]);
    }
}
