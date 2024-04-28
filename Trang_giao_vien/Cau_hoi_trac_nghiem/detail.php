<?php
include('connect.php');

// Create an array to store question data
$response = array();

// Check if the 'id' parameter is set
if(isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Prepare and execute the SQL query
    $sql = "SELECT * FROM question WHERE id_quest = ?";
    $rs = $connection->prepare($sql);
    $rs->bind_param('i', $id); // Assuming id_quest is an integer
    $rs->execute();

    // Fetch the result
    $result = $rs->get_result()->fetch_assoc();
    // Check if a record was found
    if($result) {
        // Add question data to the response array
        $response['id'] = $id;
        $response['question'] = $result['question'];
        $response['option_a'] = $result['option_a'];
        $response['option_b'] = $result['option_b'];
        $response['option_c'] = $result['option_c'];
        $response['option_d'] = $result['option_d'];
        $response['answer'] = $result['answer'];
        // Add other fields as needed
        
        // Output JSON-encoded response
        echo json_encode($response, JSON_UNESCAPED_UNICODE);
    } else {
        // No question found with the provided ID
        $response['error'] = 'No question found with id: ' . $id;
        echo json_encode($response, JSON_UNESCAPED_UNICODE);
    }
} else {
    // No 'id' parameter provided
    $response['error'] = 'No id parameter provided';
    echo json_encode($response, JSON_UNESCAPED_UNICODE);
}
?>

<?php
// include('connect.php');
// $id = $_GET['id'];
// $sql = "SELECT * FROM question WHERE id_quest = ?";
// $rs = $connection->prepare($sql);
// $rs->execute([$id]); // Passing the parameter array
// $result = $rs->fetch();
    
// echo json_encode($result, JSON_UNESCAPED_UNICODE);
?>


