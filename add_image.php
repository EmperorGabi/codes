<?php
    # require GabrielImage in this file

    function addImage(array $data) {
        GabrielImage::addImage($data);
        # implementation has been moved to GabrielFirebase;
    }

    function deleteFileIfExists($filePath) {

        if (file_exists($filePath) && is_file($filePath)) {

            if (unlink($filePath)) {

                return true;

            } else {

                return false;

            }

        }

    }



    function deleteFileByKey($key) {

        $files = glob($key . '.*'); // Match any file with any extension



        foreach ($files as $file) {

        if (file_exists($file)) {

            unlink($file); // Delete the file

            echo "Deleted: $file\n";

        } else {

            echo "File does not exist: $file\n";

        }

    }

    }

?>