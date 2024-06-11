<?php
namespace App\Reports;

use \koolreport\KoolReport;
use \koolreport\datasources\ArrayDataSource;
use App\Models\Profiles;



class MyReport extends KoolReport
{
    use \koolreport\laravel\Friendship;
    use \koolreport\bootstrap4\Theme;

   public $tableName = "profiles";

    function setup()
    {
      /*  // Fetch profiles from the database
        $profiles = Profiles::all();

        // Format the profiles data
        $formattedProfiles = $profiles->map(function ($profile) {
            return [
                "User ID" => $profile->id,
                "School Name" => $profile->school_name,
                "Motto" => $profile->motto,
                "Phone Number" => $profile->phone_number,
                "Email" => $profile->email,
                "Physical Address" => $profile->physical_address,
                "Created By" => $profile->created_by,
                "Created At" => $profile->created_at,
                "Updated At" => $profile->updated_at,
                "Logo" => $profile->logo
            ];
        })->toArray();

        // Use the formatted data in the report */
        $this->src("mysql")
             ->query("SELECT id, school_name, phone_number, email, created_at FROM {$this->tableName}")
             ->pipe($this->dataStore("users"));
    }
}
