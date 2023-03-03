<?php

namespace App\Services\OnBoardDocuments;

use App\Models\onboardingDoc;

class OnBoardDocuments
{
    public function upload_docs($patient_id, $file_name, $file_url, $under_category, $add_by, $status)
    {
        $val = null;
        if ($status == null) {
            $val = "uploaded_doc";

        } else {
            $val = "typed_doc";
        }
        // return $file_url;
        $on_board_doc = new onboardingDoc();
        $on_board_doc->patient_id = $patient_id;
        $on_board_doc->file_name = $file_name;
        $on_board_doc->add_by = $add_by;
        $on_board_doc->under_category = $under_category;
        $on_board_doc->file_url = $file_url;
        $on_board_doc->status = $val;
        $on_board_doc->save();
    }

    // doctor upload patient photo
    public function dr_side_onboard_doc($patient_id, $file, $under_category, $add_by, $status)
    {
        $val = null;
        if ($status == null) {
            $val = "uploaded_doc";

        } else {
            $val = "typed_doc";
        }
        // dd($file, $patient_id, $under_category, $add_by);
        $file_name = time() . '_' . $file->getClientOriginalName();
        upload_file($file_name, $file, 'emailattachments');
        return $this->upload_docs($patient_id, $file_name, $file_name, $under_category, $add_by, $status);
    }

    public function upload_wordprocessor($patient_id, $file, $under_category, $add_by, $status)
    {

        $val = null;
        if ($status == null) {
            $val = "uploaded_doc";

        } else {
            $val = "typed_doc";
        }
        return $this->upload_docs($patient_id, $file, $file, $under_category, $add_by, $status);
    }
}
