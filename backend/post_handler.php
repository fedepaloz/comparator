<?php
header("Access-Control-Allow-Origin: http://localhost:9000");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");
// Assuming you have already established a connection to your database
// Database configuration
$dbHost = 'localhost';
$dbName = 'comparatore_db';
$dbUser = 'root';
$dbPass = '';

// Attempt to connect to the database
try {
    // Establish a new PDO connection
    $pdo = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPass);

    // Set PDO to throw exceptions on errors
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Optionally, you can set other attributes such as character set and timezone
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $pdo->exec("SET NAMES 'utf8'");
    $pdo->exec("SET TIME_ZONE = '+00:00'"); // Set timezone if needed
} catch(PDOException $e) {
    // If connection fails, display an error message
    die("Connection failed: " . $e->getMessage());
}

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data =  json_decode(file_get_contents("php://input"), true);
    try {
        $stmt = $pdo->prepare("INSERT INTO comparator_data 
                    (
                        name
                        -- , lastname
                        -- , email
                        -- , phone_number
                        -- , compilation_date
                        -- , tax_code
                        -- , energy_bill_cadence
                        -- , energy_first_month_consumption
                        -- , energy_second_month_consumption
                        -- , energy_client_type
                        -- , energy_committed_power
                        -- , energy_available_power
                        -- , energy_annual_consumption_on_bill
                        -- , energy_first_year_on_bill
                        -- , energy_second_year_on_bill
                        -- , energy_first_month_on_bill
                        -- , energy_second_month_on_bill
                        -- , energy_vat_on_bill
                        -- , energy_interested
                        -- , gas_interested
                        -- , energy_expense
                        -- , energy_management_cost
                        -- , energy_system_charges
                        -- , energy_other_costs
                        -- , energy_excise
                        -- , energy_vat
                        -- , energy_rai_fee
                        -- , gas_first_month_consumption
                        -- , gas_second_month_consumption
                        -- , gas_client_type
                        -- , gas_annual_consumption_on_bill
                        -- , gas_first_year_on_bill
                        -- , gas_second_year_on_bill
                        -- , gas_first_month_on_bill
                        -- , gas_second_month_on_bill
                        -- , gas_vat_on_bill
                        -- , gas_expense
                        -- , gas_management_cost
                        -- , gas_system_charges
                        -- , gas_other_costs
                        -- , gas_excise
                        -- , gas_vat
                    ) 
                    VALUES (
                        :name
                        -- , :lastname
                        -- , :email
                        -- , :phone_number
                        -- , :compilation_date
                        -- , :tax_code
                        -- , :energy_bill_cadence
                        -- , :energy_first_month_consumption
                        -- , :energy_second_month_consumption
                        -- , :energy_client_type
                        -- , :energy_committed_power
                        -- , :energy_available_power
                        -- , :energy_annual_consumption_on_bill
                        -- , :energy_first_year_on_bill
                        -- , :energy_second_year_on_bill
                        -- , :energy_first_month_on_bill
                        -- , :energy_second_month_on_bill
                        -- , :energy_vat_on_bill
                        -- , :energy_interested
                        -- , :gas_interested
                        -- , :energy_expense
                        -- , :energy_management_cost
                        -- , :energy_system_charges
                        -- , :energy_other_costs
                        -- , :energy_excise
                        -- , :energy_vat
                        -- , :energy_rai_fee
                        -- , :gas_first_month_consumption
                        -- , :gas_second_month_consumption
                        -- , :gas_client_type
                        -- , :gas_annual_consumption_on_bill
                        -- , :gas_first_year_on_bill
                        -- , :gas_second_year_on_bill
                        -- , :gas_first_month_on_bill
                        -- , :gas_second_month_on_bill
                        -- , :gas_vat_on_bill
                        -- , :gas_expense
                        -- , :gas_management_cost
                        -- , :gas_system_charges
                        -- , :gas_other_costs
                        -- , :gas_excise
                        -- , :gas_vat
                    )");

                    // foreach($data as $key => $value){
                    //     $stmt->bindParam(":".$key, $value);
                    // }

                     $stmt->bindParam(":name", $data['name']);
                    // $stmt->bindParam(":lastname", $data['lastname']);
                    // $stmt->bindParam(":email", $data['email']);
                    // $stmt->bindParam(":phone_number", $data['phone_number']);
                    // $stmt->bindParam(":compilation_date", $data['compilation_date']);
                    // $stmt->bindParam(":tax_code", $data['tax_code']);
                    // $stmt->bindParam(":energy_bill_cadence", $data['energy_bill_cadence']);
                    // $stmt->bindParam(":energy_first_month_consumption", $data['energy_first_month_consumption']);
                    // $stmt->bindParam(":energy_second_month_consumption", $data['energy_second_month_consumption']);
                    // $stmt->bindParam(":energy_client_type", $data['energy_client_type']);
                    // $stmt->bindParam(":energy_committed_power", $data['energy_committed_power']);
                    // $stmt->bindParam(":energy_available_power", $data['energy_available_power']);
                    // $stmt->bindParam(":energy_annual_consumption_on_bill", $data['energy_annual_consumption_on_bill']);
                    // $stmt->bindParam(":energy_first_year_on_bill", $data['energy_first_year_on_bill']);
                    // $stmt->bindParam(":energy_second_year_on_bill", $data['energy_second_year_on_bill']);
                    // $stmt->bindParam(":energy_first_month_on_bill", $data['energy_first_month_on_bill']);
                    // $stmt->bindParam(":energy_second_month_on_bill", $data['energy_second_month_on_bill']);
                    // $stmt->bindParam(":energy_vat_on_bill", $data['energy_vat_on_bill']);
                    // $stmt->bindParam(":energy_interested", $data['energy_interested']);
                    // $stmt->bindParam(":gas_interested", $data['gas_interested']);
                    // $stmt->bindParam(":energy_expense", $data['energy_expense']);
                    // $stmt->bindParam(":energy_management_cost", $data['energy_management_cost']);
                    // $stmt->bindParam(":energy_system_charges", $data['energy_system_charges']);
                    // $stmt->bindParam(":energy_other_costs", $data['energy_other_costs']);
                    // $stmt->bindParam(":energy_excise", $data['energy_excise']);
                    // $stmt->bindParam(":energy_vat", $data['energy_vat']);
                    // $stmt->bindParam(":energy_rai_fee", $data['energy_rai_fee']);
                    // $stmt->bindParam(":gas_first_month_consumption", $data['gas_first_month_consumption']);
                    // $stmt->bindParam(":gas_second_month_consumption", $data['gas_second_month_consumption']);
                    // $stmt->bindParam(":gas_client_type", $data['gas_client_type']);
                    // $stmt->bindParam(":gas_annual_consumption_on_bill", $data['gas_annual_consumption_on_bill']);
                    // $stmt->bindParam(":gas_first_year_on_bill", $data['gas_first_year_on_bill']);
                    // $stmt->bindParam(":gas_second_year_on_bill", $data['gas_second_year_on_bill']);
                    // $stmt->bindParam(":gas_first_month_on_bill", $data['gas_first_month_on_bill']);
                    // $stmt->bindParam(":gas_second_month_on_bill", $data['gas_second_month_on_bill']);
                    // $stmt->bindParam(":gas_vat_on_bill", $data['gas_vat_on_bill']);
                    // $stmt->bindParam(":gas_expense", $data['gas_expense']);
                    // $stmt->bindParam(":gas_management_cost", $data['gas_management_cost']);
                    // $stmt->bindParam(":gas_system_charges", $data['gas_system_charges']);
                    // $stmt->bindParam(":gas_other_costs", $data['gas_other_costs']);
                    // $stmt->bindParam(":gas_excise", $data['gas_excise']);
                    // $stmt->bindParam(":gas_vat", $data['gas_vat']);
        $stmt->execute();
        
        echo "Data inserted successfully";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    // Handle other request methods (GET, PUT, DELETE, etc.) if needed
    echo "Only POST requests are allowed";
}
?>
