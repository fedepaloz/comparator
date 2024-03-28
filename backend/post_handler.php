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
                         , lastname
                         , email
                         , phone_number
                         , compilation_date
                         , tax_code
                         , energy_bill_cadence
                         , gas_bill_cadence

                         , energy_first_month_consumption
                         , energy_second_month_consumption
                         , energy_client_type
                         , energy_committed_power
                         , energy_available_power
                         , energy_annual_consumption_on_bill
                         , energy_first_year_on_bill
                         , energy_second_year_on_bill
                         , energy_first_month_on_bill
                         , energy_second_month_on_bill
                         , energy_vat_on_bill
                         , energy_interested
                         , gas_interested
                         , energy_expense
                         , energy_management_cost
                         , energy_system_charges
                         , energy_other_costs
                         , energy_excise
                         , energy_vat
                         , energy_rai_fee
                         , gas_first_month_consumption
                         , gas_second_month_consumption
                         , gas_client_type
                         , gas_annual_consumption_on_bill
                         , gas_first_year_on_bill
                         , gas_second_year_on_bill
                         , gas_first_month_on_bill
                         , gas_second_month_on_bill
                         , gas_vat_on_bill
                         , gas_expense
                         , gas_management_cost
                         , gas_system_charges
                         , gas_other_costs
                         , gas_excise
                         , gas_vat
                    ) 
                    VALUES (
                          :name 
                         , :lastname
                         , :email
                         , :phone_number
                         , :compilation_date
                         , :tax_code
                         , :energy_bill_cadence
                         , :gas_bill_cadence
                         , :energy_first_month_consumption
                         , :energy_second_month_consumption
                         , :energy_client_type
                         , :energy_committed_power
                         , :energy_available_power
                         , :energy_annual_consumption_on_bill
                         , :energy_first_year_on_bill
                         , :energy_second_year_on_bill
                         , :energy_first_month_on_bill
                         , :energy_second_month_on_bill
                         , :energy_vat_on_bill
                         , :energy_interested
                         , :gas_interested
                         , :energy_expense
                         , :energy_management_cost
                         , :energy_system_charges
                         , :energy_other_costs
                         , :energy_excise
                         , :energy_vat
                         , :energy_rai_fee
                         , :gas_first_month_consumption
                         , :gas_second_month_consumption
                         , :gas_client_type
                         , :gas_annual_consumption_on_bill
                         , :gas_first_year_on_bill
                         , :gas_second_year_on_bill
                         , :gas_first_month_on_bill
                         , :gas_second_month_on_bill
                         , :gas_vat_on_bill
                         , :gas_expense
                         , :gas_management_cost
                         , :gas_system_charges
                         , :gas_other_costs
                         , :gas_excise
                         , :gas_vat
                    )");

                    // foreach($data as $key => $value){
                    //     $stmt->bindParam(":".$key, $value);
                    // }

                     $stmt->bindParam(":name", $data['clientName']);
                     $stmt->bindParam(":lastname", $data['clientLastname']);
                     $stmt->bindParam(":email", $data['clientEmail']);
                     $stmt->bindParam(":phone_number", $data['clientPhoneNmber']);
                     $stmt->bindParam(":compilation_date", $data['compilationDate']);
                     $stmt->bindParam(":tax_code", $data['clientTaxCode']);
                     $stmt->bindParam(":energy_bill_cadence", $data['energyBillCadenceModel']);
                     $stmt->bindParam(":gas_bill_cadence", $data['gasBillCadenceModel']);
                     $stmt->bindParam(":energy_first_month_consumption", $data['energyFirstMonthConsumptionOnBill']);
                     $stmt->bindParam(":energy_second_month_consumption", $data['energySecondMonthConsumptionOnBill']);
                     $stmt->bindParam(":energy_client_type", $data['energyClientTypeModel']);
                     $stmt->bindParam(":energy_committed_power", $data['energyCommittedPower']);
                     $stmt->bindParam(":energy_available_power", $data['energyAvailablePower']);
                     $stmt->bindParam(":energy_annual_consumption_on_bill", $data['energyAnnualConsumptionOnBill']);
                     $stmt->bindParam(":energy_first_year_on_bill", $data['energyFirstYearOnBill']);
                     $stmt->bindParam(":energy_second_year_on_bill", $data['energySecondYearOnBill']);
                     $stmt->bindParam(":energy_first_month_on_bill", $data['energyFirstMonthOnBill']);
                     $stmt->bindParam(":energy_second_month_on_bill", $data['energySecondMonthOnBill']);
                     $stmt->bindParam(":energy_vat_on_bill", $data['energyVatOnBill']);
                     $stmt->bindParam(":energy_interested", $data['energyInterested']);
                     $stmt->bindParam(":gas_interested", $data['gasInterested']);
                     $stmt->bindParam(":energy_expense", $data['energyExpense']);
                     $stmt->bindParam(":energy_management_cost", $data['energyManagementCost']);
                     $stmt->bindParam(":energy_system_charges", $data['energySystemCharges']);
                     $stmt->bindParam(":energy_other_costs", $data['energyOtherCosts']);
                     $stmt->bindParam(":energy_excise", $data['energyExcise']);
                     $stmt->bindParam(":energy_vat", $data['energyVat']);
                     $stmt->bindParam(":energy_rai_fee", $data['rai']);
                     $stmt->bindParam(":gas_first_month_consumption", $data['gasFirstMonthConsumptionOnBill']);
                     $stmt->bindParam(":gas_second_month_consumption", $data['gasSecondMonthConsumptionOnBill']);
                     $stmt->bindParam(":gas_client_type", $data['gasClientTypeModel']);
                     $stmt->bindParam(":gas_annual_consumption_on_bill", $data['gasAnnualConsumptionOnBill']);
                     $stmt->bindParam(":gas_first_year_on_bill", $data['gasFirstYearOnBill']);
                     $stmt->bindParam(":gas_second_year_on_bill", $data['gasSecondYearOnBill']);
                     $stmt->bindParam(":gas_first_month_on_bill", $data['gasFirstMonthOnBill']);
                     $stmt->bindParam(":gas_second_month_on_bill", $data['gasSecondMonthOnBill']);
                     $stmt->bindParam(":gas_vat_on_bill", $data['gasVatOnBill']);
                     $stmt->bindParam(":gas_expense", $data['gasExpense']);
                     $stmt->bindParam(":gas_management_cost", $data['gasManagementCost']);
                     $stmt->bindParam(":gas_system_charges", $data['gasSystemCharges']);
                     $stmt->bindParam(":gas_other_costs", $data['gasOtherCosts']);
                     $stmt->bindParam(":gas_excise", $data['gasExcise']);
                     $stmt->bindParam(":gas_vat", $data['gasVat']);
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
