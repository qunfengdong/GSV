<?php

function emailsystem($email,$addImage) {
global $newsession_id,$synfilename,$annfilename,$database_name;
if($email != "") {

    $link = create_connection();
    $urllinks = "http://cas-bioinfo.cas.unt.edu/gsv/display.php?session_id=$newsession_id&annid=$addImage";
    $hash = md5($email);
    $useremail = "insert into userinfo (email,hash,synfilename,annfilename,url,session_id,annImage) values('$email','$hash','$synfilename','$annfilename','$urllinks','$newsession_id','$addImage')";
    $emailuser = execute_sql($database_name, $useremail, $link);

    $to  = $email;


// subject
$subject = "GSV Results";

// message
$message = "Salutations,\n
Please use the URL link below to access a visual display of your recent GSV output file.\n
Today's Synteny:
http://cas-bioinfo.cas.unt.edu/gsv/display.php?session_id=$newsession_id&annid=$addImage
\n
Note: This link will be invalid after 60 days
\n
Use the link below to view a complete list of previous synteny images from GSV within 60 days.
\n
History:
http://cas-bioinfo.cas.unt.edu/gsv/historypage.php?hash=$hash&annImage=$addImage
\n
Thank you for choosing to use GSV.  We are happy to hear any questions or comments at Qunfeng.Dong@unt.edu
\n
Regards,
GSV team
\n
Note: Do not reply to this email.
";
   mail($to, $subject, $message);
}
}

?>
