<?php

 if(isset($_POST['email'])){

  $email = $_POST['email']."\r\n";


  $handler = fopen('email_list.txt','a');
  if(fwrite($handler,$email)){
    echo "success";
  }

  }
  
  
function syncMailchimp($data) {
    $apiKey = 'your api key';
    $listId = 'your list id';
	$template = '';
	$fromEmail = '';

    $memberId = md5(strtolower($data['email']));
    $dataCenter = substr($apiKey,strpos($apiKey,'-')+1);
    $url = 'https://' . $dataCenter . '.api.mailchimp.com/3.0/lists/' . $listId . '/members/' . $memberId;

    $json = json_encode([
        'email_address' => $data['email'],
        'status'        => 'subscribed' // "subscribed","unsubscribed","cleaned","pending"
        //'merge_fields'  => [
        //    'FNAME'     => $data['firstname'],
        //    'LNAME'     => $data['lastname']
        //]
    ]);
	
	$jsonMessage = json_encode([
        'template_name' => $template,
        'template_content' => [], 
        'message'  => [
            'html'     => '',
            'text'     => '',
			'from_email' => $fromEmail,
			'subject' => 'Welcome to the Swopblock Network',
			'to': [{ 'email': $data['email'], 'type': 'to' }]
        ]
    ]);

    $ch = curl_init($url);

    curl_setopt($ch, CURLOPT_USERPWD, 'user:' . $apiKey);
    curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $json);                                                                                                                 

    $result = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    return $httpCode;
	
	//MESSAGE='{"key": "$YOUR_API_KEY", "message": {"from_email": "hello@example.com", "subject": "Hello World", "text": "Welcome to Mailchimp Transactional!", "to": [{ "email": "freddie@example.com", "type": "to" }]}}'

//curl -sS -X POST "https://mandrillapp.com/api/1.0/messages/send" --header 'Content-Type: application/json' --data-raw "$MESSAGE"
//curl -X POST \
  //https://mandrillapp.com/api/1.0/messages/send-template \
  //-d '{"key":"","template_name":"","template_content":[],"message":{"html":"","text":"","subject":"","from_email":"","from_name":"","to":[],"headers":{},"important":false,"track_opens":false,"track_clicks":false,"auto_text":false,"auto_html":false,"inline_css":false,"url_strip_qs":false,"preserve_recipients":false,"view_content_link":false,"bcc_address":"","tracking_domain":"","signing_domain":"","return_path_domain":"","merge":false,"merge_language":"mailchimp","global_merge_vars":[],"merge_vars":[],"tags":[],"subaccount":"","google_analytics_domains":[],"google_analytics_campaign":"","metadata":{"website":""},"recipient_metadata":[],"attachments":[],"images":[]},"async":false,"ip_pool":"","send_at":""}'
//curl -X POST \
  //'https://server.api.mailchimp.com/3.0/lists/{list_id}/members?skip_merge_validation=<SOME_BOOLEAN_VALUE>' \ ->true
 // -H 'authorization: Basic <USERNAME:PASSWORD>' \
 // -d '{"email_address":"","email_type":"","status":"subscribed","merge_fields":{},"interests":{},"language":"","vip":false,"location":{"latitude":0,"longitude":0},"marketing_permissions":[],"ip_signup":"","timestamp_signup":"","ip_opt":"","timestamp_opt":"","tags":[]}'
 
 //https://mailchimp.com/help/about-api-keys/
 ?>