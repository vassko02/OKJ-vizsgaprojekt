<?php
class Guest extends Dbconnect
{
  public function getallusers()
  {
    $sql = 'SELECT * FROM customer';
    $result = $this->con->query($sql);
    $users = array();
    while ($row = $result->fetch_assoc()) {
      $users[] = $row;
    }
    return $users;
  }
  public function getuserbyid($username)
  {
    $sql = 'SELECT * FROM customer where customer.UserName = ?';
    $stmt = $this->con->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    return $row;
  }
  public function getuserbyidreal($id)
  {
    $sql = 'SELECT * FROM customer where customer.CustomerID = ?';
    $stmt = $this->con->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    return $row;
  }
  public function savecustomer($adatok)
  {
    $sql = 'INSERT INTO customer (Name,PhoneNumber,Email,Address) VALUES (?,?,?,?)';
    $stmt = $this->con->prepare($sql);
    $stmt->bind_param("ssss", $adatok['name'], $adatok['tel'], $adatok['email'], $adatok['address']);
    $stmt->execute();
  }
  public function updatecustomer($adatok)
  {
    $sql = "UPDATE customer SET Name=?, PhoneNumber=?, Email=?, Address=? WHERE customer.Email = ?";
    $stmt = $this->con->prepare($sql);
    $stmt->bind_param("sssss", $adatok['name'], $adatok['tel'], $adatok['email'], $adatok['address'], $adatok['email']);
    $stmt->execute();
  }
  public function findcustomerbyemail($email)
  {
    $sql = 'SELECT * FROM customer WHERE email=?';
    $stmt = $this->con->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
      //oke
      $row = $result->fetch_assoc();
      return $row;
    } else {
      return 0;
    }
  }
  public function findcustomerbyemail2($email)
  {
    $sql = 'SELECT * FROM customer WHERE email=?';
    $stmt = $this->con->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    return $row;
  }
  public function saveguestproblem($adatok)
  {
    $sql = 'INSERT INTO reports (GuestName,Email,Problem,Time) VALUES (?,?,?,now())';
    $stmt = $this->con->prepare($sql);
    $stmt->bind_param("sss", $adatok['firstname'], $adatok['email'], $adatok['textarea']);
    if ($stmt->execute()) {
      return 1;
    }
    return 0;
  }
  public function logincheck($email, $jelszo)
  {

    $sql = 'SELECT * FROM customer WHERE Email=? AND Password=md5(?)';

    $stmt = $this->con->prepare($sql);
    $stmt->bind_param("ss", $email, $jelszo);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
      //oke
      $row = $result->fetch_assoc();
      return $row;
    } else {
      return 0;
    }
  }
  public function getreservationsnumber($id){
    $sql= 'SELECT ReservationNumber FROM customer WHERE customer.CustomerID = ?';
    $stmt = $this->con->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    return $row;

  }
  public function getlevel($id){
    $sql= 'SELECT LEVEL FROM customer WHERE customer.CustomerID = ?';
    $stmt = $this->con->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    return $row;

  }
  public function addonetoreservationnumber($id,$number){
    $sql= 'UPDATE customer SET ReservationNumber=? WHERE customer.CustomerID = ?';
    $stmt = $this->con->prepare($sql);
    $stmt->bind_param("ii", $number, $id);
    $stmt->execute();

  }
  public function updatelevel($id,$level){
    $sql= 'UPDATE customer SET LEVEL=? WHERE customer.CustomerID = ?';
    $stmt = $this->con->prepare($sql);
    $stmt->bind_param("si", $level, $id);
    $stmt->execute();
  }
  public function eemailcsekk($email)
  {
    $sql = 'SELECT Email FROM customer WHERE Email=?';
    $stmt = $this->con->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();

    $result = $stmt->get_result();

        return $result->num_rows;
    }
    public function eemailcsekkforuseredit($email,$id)
    {
        $sql = 'SELECT Email FROM customer WHERE Email=? AND CustomerID != ?';
        $stmt = $this->con->prepare($sql);
        $stmt->bind_param("si", $email,$id);
        $stmt->execute();

        $result = $stmt->get_result();

        return $result->num_rows;
    }
    
    public function eemailcsekkforuseraccedit($email,$id)
    {
        $sql = 'SELECT Email FROM customer WHERE Email=? AND CustomerID = ?';
        $stmt = $this->con->prepare($sql);
        $stmt->bind_param("si", $email,$id);
        $stmt->execute();

        $result = $stmt->get_result();

        return $result->num_rows;
    }
    public function usernamecsekk($username)
    {
        $sql = 'SELECT UserName FROM customer WHERE UserName=?';
        $stmt = $this->con->prepare($sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();

    $result = $stmt->get_result();

    return $result->num_rows;
  }
    public function usernamecsekkforuseredit($username,$id)
    {
        $sql = 'SELECT UserName FROM customer WHERE UserName=? AND CustomerID != ?';
        $stmt = $this->con->prepare($sql);
        $stmt->bind_param("si", $username,$id);
        $stmt->execute();

        $result = $stmt->get_result();

        return $result->num_rows;
    }
    public function saveuser($adatok)
    {
        $sql = 'INSERT INTO customer (Name,Email,UserName,Password) VALUES(?,?,?,md5(?))';
        $stmt = $this->con->prepare($sql);
        $stmt->bind_param("ssss", $adatok['name'], $adatok['email'], $adatok['username'], $adatok['jelszo']);
        if ($stmt->execute()) {
            return 1;
        }
        return 0;
    }
    public function saveuser_activation_token($activation_code, $customerid) {
        $sql = 'INSERT INTO codes (Code,Expiry,Type,CustomerID) VALUES(md5(?),?,?,?)';
        $stmt = $this->con->prepare($sql);
        $date = date('Y-m-d H:i:s', time() + 1 * 24 * 60 * 60);
        $type = 'activation_code';
        $stmt->bind_param("sssi", $activation_code, $date, $type, $customerid);
        return $stmt->execute();
    }
    public function logincsekkemail($email, $jelszo)
    {

    $sql = 'SELECT * FROM customer WHERE email=? AND password=md5(?)';

    $stmt = $this->con->prepare($sql);
    $stmt->bind_param("ss", $email, $jelszo);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
      //oke
      $row = $result->fetch_assoc();
      return $row;
    } else {
      return 0;
    }
  }
    
  
    public function logincsekkusername($username, $jelszo)
    {

    $sql = 'SELECT * FROM customer WHERE UserName=? AND password=md5(?)';

    $stmt = $this->con->prepare($sql);
    $stmt->bind_param("ss", $username, $jelszo);
    $stmt->execute();

    $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            //oke
            $row = $result->fetch_assoc();
            return $row;
        } else {
            return 0;
        }
    }
    public function updatecustomeradmin($adatok){
        $sql = "UPDATE customer SET Name=?, PhoneNumber=?,Email=?, UserName=?,  Address=?, IsAdmin = ? WHERE customer.CustomerID = ?";
        $stmt = $this->con->prepare($sql);
        $stmt->bind_param("sssssis",$adatok['name'],$adatok['phonenumber'],$adatok['email'],$adatok['username'],$adatok['address'],$adatok['isadmin'],$adatok['CustomerID']);
        $stmt->execute();
    }
    public function updatecustomer2($adatok){
        $sql = "UPDATE customer SET Name=?, PhoneNumber=?, Email=?, Address=?,UserName=? WHERE customer.CustomerID = ?";
        $stmt = $this->con->prepare($sql);
        $stmt->bind_param("sssssi",$adatok['name'],$adatok['phonenumber'],$adatok['Emailforpost'],$adatok['address'],$adatok['username'],$adatok['CustomerID']);
        $stmt->execute();
    }
  
  public function deleteuser($id)
  {
    $sql = "DELETE FROM customer WHERE customer.CustomerID = ?";
    $stmt = $this->con->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
  }

  //php email verification teszt
  public function is_user_active($user)
  {
    return (int)$user['active'] === 1;
  }
  public function generate_activation_code(): string
  {
    return bin2hex(random_bytes(16));
  }
  public function send_activation_emailfornewacc(int $customerid,string $email, string $newacccode,$oldemail, $baseUrl): void
  {
    // create the activation link
    $activation_link = 'diak.jedlik.eu' . $baseUrl . "/activate?email=$email&newacccode=$newacccode&oldemail=$oldemail&customerid=$customerid";

    // set email subject & body
    $subject = 'Account activation';
    //$message = 'Link: '.$activation_link.'';
    $message = '<!DOCTYPE HTML
        PUBLIC "-//W3C//DTD XHTML 1.0 Transitional //EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
      <html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml"
        xmlns:o="urn:schemas-microsoft-com:office:office">
      
      <head>
        <!--[if gte mso 9]>
      <xml>
        <o:OfficeDocumentSettings>
          <o:AllowPNG/>
          <o:PixelsPerInch>96</o:PixelsPerInch>
        </o:OfficeDocumentSettings>
      </xml>
      <![endif]-->
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="x-apple-disable-message-reformatting">
        <!--[if !mso]><!-->
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!--<![endif]-->
        <title></title>
      
        <style type="text/css">
          table,
          td {
            color: #000000;
          }
      
          a {
            color: #cca250;
            text-decoration: none;
          }
          #nyitokep .u-row {
            padding-top: 25px !important;
            padding-bottom: 25px !important;
            background-color: black !important;
          }
      
          @media (max-width: 480px) {
            #u_content_image_4 .v-src-width {
              width: auto !important;
            }
      
            #u_content_image_4 .v-src-max-width {
              max-width: 100% !important;
            }
      
            #u_content_image_3 .v-container-padding-padding {
              padding: 46px 10px 10px !important;
            }
      
            #u_content_image_3 .v-src-width {
              width: auto !important;
            }
      
            #u_content_image_3 .v-src-max-width {
              max-width: 29% !important;
            }
      
            #u_content_heading_3 .v-container-padding-padding {
              padding: 10px 20px !important;
            }
      
            #u_content_heading_3 .v-font-size {
              font-size: 28px !important;
            }
      
            #u_content_text_3 .v-container-padding-padding {
              padding: 10px 22px 26px !important;
            }
      
            #u_content_heading_2 .v-container-padding-padding {
              padding: 22px 22px 10px !important;
            }
      
            #u_content_heading_2 .v-font-size {
              font-size: 24px !important;
            }
          }
      
          @media only screen and (min-width: 620px) {
            .u-row {
              width: 600px !important;
            }
      
            .u-row .u-col {
              vertical-align: top;
            }
      
            .u-row .u-col-18 {
              width: 108px !important;
            }
      
            .u-row .u-col-18p34 {
              width: 110.04px !important;
            }
      
            .u-row .u-col-63p66 {
              width: 381.96px !important;
            }
      
            .u-row .u-col-100 {
              width: 600px !important;
            }
      
          }
      
          @media (max-width: 620px) {
            .u-row-container {
              max-width: 100% !important;
              padding-left: 0px !important;
              padding-right: 0px !important;
            }
      
            .u-row .u-col {
              min-width: 320px !important;
              max-width: 100% !important;
              display: block !important;
            }
      
            .u-row {
              width: calc(100% - 40px) !important;
            }
      
            .u-col {
              width: 100% !important;
            }
      
            .u-col>div {
              margin: 0 auto;
            }
          }
      
          body {
            margin: 0;
            padding: 0;
          }
      
          table,
          tr,
          td {
            vertical-align: top;
            border-collapse: collapse;
          }
      
          p {
            margin: 0;
          }
      
          .ie-container table,
          .mso-container table {
            table-layout: fixed;
          }
      
          * {
            line-height: inherit;
          }
      
          a[x-apple-data-detectors="true"] {
            color: inherit !important;
            text-decoration: none !important;
          }
        </style>
      
      
      
        <!--[if !mso]><!-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700&display=swap" rel="stylesheet" type="text/css">
        <!--<![endif]-->
      
      </head>
      
      <body class="clean-body u_body"
        style="margin: 0;padding: 0;-webkit-text-size-adjust: 100%;background-color: #f9f9f9;color: #000000">
        <!--[if IE]><div class="ie-container"><![endif]-->
        <!--[if mso]><div class="mso-container"><![endif]-->
        <table
          style="border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;min-width: 320px;Margin: 0 auto;background-color: #f9f9f9;width:100%"
          cellpadding="0" cellspacing="0">
          <tbody>
            <tr style="vertical-align: top">
              <td style="word-break: break-word;border-collapse: collapse !important;vertical-align: top">
                <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td align="center" style="background-color: #f9f9f9;"><![endif]-->
      
      
                <div class="u-row-container" id="nyitokep" style="padding: 0px;background-color: transparent">
                  <div class="u-row"
                    style="Margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: #111114;">
                    <div style="border-collapse: collapse;display: table;width: 100%;background-color: transparent;">
                      <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding: 0px;background-color: transparent;" align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:600px;"><tr style="background-color: #111114;"><![endif]-->
      
                      <!--[if (mso)|(IE)]><td align="center" width="600" style="width: 600px;padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;" valign="top"><![endif]-->
                      <div class="u-col u-col-100"
                        style="max-width: 320px;min-width: 600px;display: table-cell;vertical-align: top;">
                        <div
                          style="width: 100% !important;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;">
                          <!--[if (!mso)&(!IE)]><!-->
                          <div
                            style="padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;">
                            <!--<![endif]-->
      
                            <table id="u_content_image_4" style="font-family:Montserrat,sans-serif;" role="presentation"
                              cellpadding="0" cellspacing="0" width="100%" border="0">
                              <tbody>
                                <tr>
                                  <td class="v-container-padding-padding"
                                    style="overflow-wrap:break-word;word-break:break-word;font-family:Montserrat,sans-serif;"
                                    align="left">
      
                                    <table width="100%" cellpadding="0" cellspacing="0" border="0">
                                      <tr>
                                        <td style="padding-right: 0px;padding-left: 0px;" align="center">
      
                                          <img align="center" border="0" src="http://diak.jedlik.eu/~PeacefulParadise/pictures/korulvagott_logo.png" alt="Logo" title="Logo"
                                            style="outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: inline-block !important;border: none;height: auto;float: none;width: 100%;max-width: 100%;"
                                            width="469.8" class="v-src-width v-src-max-width" />
      
                                        </td>
                                      </tr>
                                    </table>
      
                                  </td>
                                </tr>
                              </tbody>
                            </table>
      
                            <!--[if (!mso)&(!IE)]><!-->
                          </div>
                          <!--<![endif]-->
                        </div>
                      </div>
                      <!--[if (mso)|(IE)]></td><![endif]-->
                      <!--[if (mso)|(IE)]></tr></table></td></tr></table><![endif]-->
                    </div>
                  </div>
                </div>
      
      
      
                <div class="u-row-container" style="padding: 0px;background-color: transparent">
                  <div class="u-row"
                    style="Margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: transparent;">
                    <div style="border-collapse: collapse;display: table;width: 100%;background-color: transparent;">
                      <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding: 0px;background-color: transparent;" align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:600px;"><tr style="background-color: transparent;"><![endif]-->
      
                      <!--[if (mso)|(IE)]><td align="center" width="600" style="background-color: #fffefe;width: 600px;padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;" valign="top"><![endif]-->
                      <div class="u-col u-col-100"
                        style="max-width: 320px;min-width: 600px;display: table-cell;vertical-align: top;">
                        <div
                          style="background-color: #fffefe;width: 100% !important;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;">
                          <!--[if (!mso)&(!IE)]><!-->
                          <div
                            style="padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;">
                            <!--<![endif]-->
      
                            <table id="u_content_image_3" style="font-family:Montserrat,sans-serif;" role="presentation"
                        cellpadding="0" cellspacing="0" width="100%" border="0">
                        <tbody>
                          <tr>
                            <td class="v-container-padding-padding"
                              style="overflow-wrap:break-word;word-break:break-word;padding:55px 10px 10px;font-family:Montserrat,sans-serif;"
                              align="left">

                              <table width="100%" cellpadding="0" cellspacing="0" border="0">
                                <tr>
                                  <td style="padding-right: 0px;padding-left: 0px;" align="center">

                                    <img align="center" border="0" src="https://media.istockphoto.com/vectors/mail-post-envelope-icon-shape-postage-letter-logo-symbol-email-sign-vector-id1189293453?k=20&m=1189293453&s=170667a&w=0&h=0qLb01CW7QhspfsfOBzXvzAz0rRB8jT-mMytGkgsqP0=" alt="Tick Icon"
                                      title="Tick Icon"
                                      style="outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: inline-block !important;border: none;height: auto;float: none;width: 23%;"
                                      width="81.2" class="v-src-width v-src-max-width" />

                                  </td>
                                </tr>
                              </table>

                            </td>
                          </tr>
                        </tbody>
                      </table>
      
                            <table id="u_content_heading_3" style="font-family:Montserrat,sans-serif;" role="presentation"
                              cellpadding="0" cellspacing="0" width="100%" border="0">
                              <tbody>
                                <tr>
                                  <td class="v-container-padding-padding"
                                    style="overflow-wrap:break-word;word-break:break-word;padding:10px 55px;font-family:Montserrat,sans-serif;"
                                    align="left">
      
                                    <h1 class="v-font-size"
                                      style="margin: 0px; line-height: 160%; text-align: center; word-wrap: break-word; font-weight: normal; font-family: Montserrat,sans-serif; font-size: 33px;">
                                      <strong>Verify Your E-mail Address<br/></strong>
                                    </h1>
      
                                  </td>
                                </tr>
                              </tbody>
                            </table>
      
                            <table id="u_content_text_3" style="font-family:Montserrat,sans-serif;" role="presentation"
                              cellpadding="0" cellspacing="0" width="100%" border="0">
                              <tbody>
                                <tr>
                                  <td class="v-container-padding-padding"
                                    style="overflow-wrap:break-word;word-break:break-word;padding:10px 60px 50px;font-family:Montserrat,sans-serif;"
                                    align="left">
      
                                    <div
                                      style="color: #444444; line-height: 170%; text-align: center; word-wrap: break-word;">
                                      <p style="font-size: 14px; line-height: 170%;"><span
                                          style="font-size: 16px; line-height: 27.2px;">You are almost ready to get started. 
                                          Please click on the button below to verify your email address to get full access to our services.<br /></span></p>
                                          <p style="font-size: 14px; line-height: 170%;"><span
                                      style="font-size: 16px; line-height: 27.2px;">The link is valid for one day.<br /></span></p>
                                    </div>
      
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                            <table style="font-family:Montserrat,sans-serif;" role="presentation" cellpadding="0"
                              cellspacing="0" width="100%" border="0">
                              <tbody>
                                <tr>
                                  <td class="v-container-padding-padding"
                                    style="overflow-wrap:break-word;word-break:break-word;padding:10px 10px 50px;font-family:Montserrat,sans-serif;"
                                    align="left">
      
                                    <div align="center">
                                      <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0" style="border-spacing: 0; border-collapse: collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;font-family:Montserrat,sans-serif;"><tr><td style="font-family:Montserrat,sans-serif;" align="center"><v:roundrect xmlns:v="urn:schemas-microsoft-com:vml" xmlns:w="urn:schemas-microsoft-com:office:word" href="http://diak.jedlik.eu/~PeacefulParadise/contactus" style="height:47px; v-text-anchor:middle; width:172px;" arcsize="8.5%" stroke="f" fillcolor="#cca250"><w:anchorlock/><center style="color:#FFFFFF;font-family:Montserrat,sans-serif;"><![endif]-->
                                      <a href="' . $activation_link . '" target="_blank"
                                        style="box-sizing: border-box;display: inline-block;font-family:Montserrat,sans-serif;text-decoration: none;-webkit-text-size-adjust: none;text-align: center;color: #FFFFFF; background-color: #cca250; border-radius: 4px;-webkit-border-radius: 4px; -moz-border-radius: 4px; width:auto; max-width:100%; overflow-wrap: break-word; word-break: break-word; word-wrap:break-word; mso-border-alt: none;">
                                        <span style="display:block;padding:14px 33px;line-height:120%;"><strong><span
                                              style="font-size: 16px; line-height: 19.2px;">Verify email now
                                              &rarr;</span></strong></span>
                                      </a>
                                      <!--[if mso]></center></v:roundrect></td></tr></table><![endif]-->
                                    </div>
      
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                            <!--[if (!mso)&(!IE)]><!-->
                          </div>
                          <!--<![endif]-->
                        </div>
                      </div>
                      <!--[if (mso)|(IE)]></td><![endif]-->
                      <!--[if (mso)|(IE)]></tr></table></td></tr></table><![endif]-->
                    
                  </div>
                    
                  </div>
                </div>
                
      
      
                <div class="u-row-container" style="padding: 0px;background-color: transparent">
                  <div class="u-row"
                    style="Margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: #ffffff;">
                    <div style="border-collapse: collapse;display: table;width: 100%;background-color: transparent;">
                      <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding: 0px;background-color: transparent;" align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:600px;"><tr style="background-color: #ffffff;"><![endif]-->
      
                      <!--[if (mso)|(IE)]><td align="center" width="108" style="width: 108px;padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;" valign="top"><![endif]-->
                      <div class="u-col u-col-18"
                        style="max-width: 320px;min-width: 108px;display: table-cell;vertical-align: top;">
                        <div
                          style="width: 100% !important;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;">
                          <!--[if (!mso)&(!IE)]><!-->
                          <div
                            style="padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;">
                            <!--<![endif]-->
      
                            <table style="font-family:Montserrat,sans-serif;" role="presentation" cellpadding="0"
                              cellspacing="0" width="100%" border="0">
                              <tbody>
                                <tr>
                                  <td class="v-container-padding-padding"
                                    style="overflow-wrap:break-word;word-break:break-word;padding:10px;font-family:Montserrat,sans-serif;"
                                    align="left">
      
                                    <table height="0px" align="center" border="0" cellpadding="0" cellspacing="0" width="100%"
                                      style="border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;border-top: 0px solid #ffffff;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%">
                                      <tbody>
                                        <tr style="vertical-align: top">
                                          <td
                                            style="word-break: break-word;border-collapse: collapse !important;vertical-align: top;font-size: 0px;line-height: 0px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%">
                                            <span>&#160;</span>
                                          </td>
                                        </tr>
                                      </tbody>
                                    </table>
      
                                  </td>
                                </tr>
                              </tbody>
                            </table>
      
                            <!--[if (!mso)&(!IE)]><!-->
                          </div>
                          <!--<![endif]-->
                        </div>
                      </div>
                      <!--[if (mso)|(IE)]></td><![endif]-->
                      <!--[if (mso)|(IE)]><td align="center" width="380" style="background-color: #cca250;width: 380px;padding: 20px;border-top: 1px solid #CCC;border-left: 1px solid #CCC;border-right: 1px solid #CCC;border-bottom: 1px solid #CCC;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;" valign="top"><![endif]-->
                      
                      <!--[if (mso)|(IE)]></td><![endif]-->
                      <!--[if (mso)|(IE)]><td align="center" width="110" style="width: 110px;padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;" valign="top"><![endif]-->
                      <div class="u-col u-col-18p34"
                        style="max-width: 320px;min-width: 110px;display: table-cell;vertical-align: top;">
                        <div
                          style="width: 100% !important;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;">
                          <!--[if (!mso)&(!IE)]><!-->
                          <div
                            style="padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;">
                            <!--<![endif]-->
      
                            <table style="font-family:Montserrat,sans-serif;" role="presentation" cellpadding="0"
                              cellspacing="0" width="100%" border="0">
                              <tbody>
                                <tr>
                                  <td class="v-container-padding-padding"
                                    style="overflow-wrap:break-word;word-break:break-word;padding:10px;font-family:Montserrat,sans-serif;"
                                    align="left">
      
                                    <table height="0px" align="center" border="0" cellpadding="0" cellspacing="0" width="100%"
                                      style="border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;border-top: 0px solid #ffffff;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%">
                                      <tbody>
                                        <tr style="vertical-align: top">
                                          <td
                                            style="word-break: break-word;border-collapse: collapse !important;vertical-align: top;font-size: 0px;line-height: 0px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%">
                                            <span>&#160;</span>
                                          </td>
                                        </tr>
                                      </tbody>
                                    </table>
      
                                  </td>
                                </tr>
                              </tbody>
                            </table>
      
                            <!--[if (!mso)&(!IE)]><!-->
                          </div>
                          <!--<![endif]-->
                        </div>
                      </div>
                      <!--[if (mso)|(IE)]></td><![endif]-->
                      <!--[if (mso)|(IE)]></tr></table></td></tr></table><![endif]-->
                    </div>
                  </div>
                </div>
      
      
      
                <div class="u-row-container" style="padding: 0px;background-color: transparent">
                  <div class="u-row"
                    style="Margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: #ffffff;">
                    <div style="border-collapse: collapse;display: table;width: 100%;background-color: transparent;">
                      <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding: 0px;background-color: transparent;" align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:600px;"><tr style="background-color: #ffffff;"><![endif]-->
      
                      <!--[if (mso)|(IE)]><td align="center" width="600" style="width: 600px;padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;" valign="top"><![endif]-->
                      <div class="u-col u-col-100"
                        style="max-width: 320px;min-width: 600px;display: table-cell;vertical-align: top;">
                        <div
                          style="width: 100% !important;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;">
                          <!--[if (!mso)&(!IE)]><!-->
                          <div
                            style="padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;">
                            <!--<![endif]-->
      
                            <table style="font-family:Montserrat,sans-serif;" role="presentation" cellpadding="0"
                              cellspacing="0" width="100%" border="0">
                              <tbody>
                                <tr>
                                  <td class="v-container-padding-padding"
                                    style="overflow-wrap:break-word;word-break:break-word;padding:0px 60px 20px;font-family:Montserrat,sans-serif;"
                                    align="left">
      
                                    <div
                                      style="color: #444444; line-height: 170%; word-wrap: break-word;">
                                      <p style="font-size: 14px; line-height: 170%;"><span
                                          style="font-size: 16px; line-height: 27.2px;">If you have any issues with the button above, copy this link and paste in your web browser:</span>
                                      </p>
                                      
                                    </div>
      
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                            <table style="font-family:Montserrat,sans-serif;" role="presentation" cellpadding="0"
                              cellspacing="0" width="100%" border="0">
                              <tbody>
                                <tr>
                                  <td class="v-container-padding-padding"
                                    style="overflow-wrap:break-word;word-break:break-word;padding:0px 60px 20px;font-family:Montserrat,sans-serif;"
                                    align="left">
      
                                    <div
                                      style="color: #444444; line-height: 170%; word-wrap: break-word;">
                                      <p style="font-size: 14px; line-height: 170%;"><span
                                          style="font-size: 16px; line-height: 27.2px;"> ' . $activation_link . ' </span>
                                      </p>
                                    </div>
      
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                            <!--[if (!mso)&(!IE)]><!-->
                          </div>
                          <!--<![endif]-->
                        </div>
                      </div>
                      <!--[if (mso)|(IE)]></td><![endif]-->
                      <!--[if (mso)|(IE)]></tr></table></td></tr></table><![endif]-->
                    </div>
                  </div>
                </div>
      
      
      
                <div class="u-row-container" style="padding: 0px;background-color: transparent">
                  <div class="u-row"
                    style="Margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: #111114;">
                    <div style="border-collapse: collapse;display: table;width: 100%;background-color: transparent;">
                      <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding: 0px;background-color: transparent;" align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:600px;"><tr style="background-color: #111114;"><![endif]-->
      
                      <!--[if (mso)|(IE)]><td align="center" width="600" style="width: 600px;padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;" valign="top"><![endif]-->
                      <div class="u-col u-col-100"
                        style="max-width: 320px;min-width: 600px;display: table-cell;vertical-align: top;">
                        <div
                          style="width: 100% !important;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;">
                          <!--[if (!mso)&(!IE)]><!-->
                          <div
                            style="padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;">
                            <!--<![endif]-->
      
                            <table style="font-family:Montserrat,sans-serif;" role="presentation" cellpadding="0"
                              cellspacing="0" width="100%" border="0">
                              <tbody>
                                <tr>
                                  <td class="v-container-padding-padding"
                                    style="overflow-wrap:break-word;word-break:break-word;padding:32px 10px 0px;font-family:Montserrat,sans-serif;"
                                    align="left">
      
                                    <div
                                      style="color: #ffffff; line-height: 140%; text-align: center; word-wrap: break-word;">
                                      <p style="font-size: 14px; line-height: 140%;"><span
                                          style="font-size: 18px; line-height: 25.2px;"><strong>Peaceful Paradise Royale
                                            Hotel<br /></strong></span></p>
                                    </div>
      
                                  </td>
                                </tr>
                              </tbody>
                            </table>
      
                            <table style="font-family:Montserrat,sans-serif;" role="presentation" cellpadding="0"
                              cellspacing="0" width="100%" border="0">
                              <tbody>
                                <tr>
                                  <td class="v-container-padding-padding"
                                    style="overflow-wrap:break-word;word-break:break-word;padding:10px;font-family:Montserrat,sans-serif;"
                                    align="left">
      
                                    <div
                                      style="color: #b0b1b4; line-height: 180%; text-align: center; word-wrap: break-word;">
                                      <p style="font-size: 14px; line-height: 180%;">3570 S Las Vegas Blvd, Las Vegas, NV</p>
                                      <p style="font-size: 14px; line-height: 180%;">+18143008324</p>
                                    </div>
      
                                  </td>
                                </tr>
                              </tbody>
                            </table>
      
                            <table style="font-family:Montserrat,sans-serif;" role="presentation" cellpadding="0"
                              cellspacing="0" width="100%" border="0">
                              <tbody>
                                <tr>
                                  <td class="v-container-padding-padding"
                                    style="overflow-wrap:break-word;word-break:break-word;padding:10px;font-family:Montserrat,sans-serif;"
                                    align="left">
      
                                    <table height="0px" align="center" border="0" cellpadding="0" cellspacing="0" width="82%"
                                      style="border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;border-top: 1px solid #9495a7;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%">
                                      <tbody>
                                        <tr style="vertical-align: top">
                                          <td
                                            style="word-break: break-word;border-collapse: collapse !important;vertical-align: top;font-size: 0px;line-height: 0px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%">
                                            <span>&#160;</span>
                                          </td>
                                        </tr>
                                      </tbody>
                                    </table>
      
                                  </td>
                                </tr>
                              </tbody>
                            </table>
      
                            <table style="font-family:Montserrat,sans-serif;" role="presentation" cellpadding="0"
                              cellspacing="0" width="100%" border="0">
                              <tbody>
                                <tr>
                                  <td class="v-container-padding-padding"
                                    style="overflow-wrap:break-word;word-break:break-word;padding:0px 10px 13px;font-family:Montserrat,sans-serif;"
                                    align="left">
      
                                    <div
                                      style="color: #b0b1b4; line-height: 180%; text-align: center; word-wrap: break-word;">
                                      <p style="font-size: 14px; line-height: 180%;">&copy; 2022 All Rights Reserved</p>
                                    </div>
      
                                  </td>
                                </tr>
                              </tbody>
                            </table>
      
                            <!--[if (!mso)&(!IE)]><!-->
                          </div>
                          <!--<![endif]-->
                        </div>
                      </div>
                      <!--[if (mso)|(IE)]></td><![endif]-->
                      <!--[if (mso)|(IE)]></tr></table></td></tr></table><![endif]-->
                    </div>
                  </div>
                </div>
      
      
                <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
              </td>
            </tr>
          </tbody>
        </table>
        <!--[if mso]></div><![endif]-->
        <!--[if IE]></div><![endif]-->
      </body>
      
      </html>';
    // email header
    $headers[] = 'MIME-Version: 1.0';
    $headers[] = 'Content-type: text/html; charset=iso-8859-1';
    
    $headers[] = 'From: Peaceful Paradise <peacefulparadise@diak.jedlik.eu>';
    //$headers[] = 'Cc: peacefulparadiseofficial@gmail.com';
    //$headers[] = 'Bcc: peacefulparadiseofficial@gmail.com';

    // send the email
    mail($email, $subject, $message, implode("\r\n", $headers));

    //file_put_contents('teszt.txt', 'teszt', FILE_APPEND | LOCK_EX);
  }
  public function send_activation_email(string $email, string $activation_code, $baseUrl): void
  {
    // create the activation link
    $activation_link = 'diak.jedlik.eu' . $baseUrl . "/activate?email=$email&activation_code=$activation_code";

    // set email subject & body
    $subject = 'Account activation';
    //$message = 'Link: '.$activation_link.'';
    $message = '<!DOCTYPE HTML
        PUBLIC "-//W3C//DTD XHTML 1.0 Transitional //EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
      <html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml"
        xmlns:o="urn:schemas-microsoft-com:office:office">
      
      <head>
        <!--[if gte mso 9]>
      <xml>
        <o:OfficeDocumentSettings>
          <o:AllowPNG/>
          <o:PixelsPerInch>96</o:PixelsPerInch>
        </o:OfficeDocumentSettings>
      </xml>
      <![endif]-->
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="x-apple-disable-message-reformatting">
        <!--[if !mso]><!-->
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!--<![endif]-->
        <title></title>
      
        <style type="text/css">
          table,
          td {
            color: #000000;
          }
      
          a {
            color: #cca250;
            text-decoration: none;
          }
          #nyitokep .u-row {
            padding-top: 25px !important;
            padding-bottom: 25px !important;
            background-color: black !important;
          }
      
          @media (max-width: 480px) {
            #u_content_image_4 .v-src-width {
              width: auto !important;
            }
      
            #u_content_image_4 .v-src-max-width {
              max-width: 100% !important;
            }
      
            #u_content_image_3 .v-container-padding-padding {
              padding: 46px 10px 10px !important;
            }
      
            #u_content_image_3 .v-src-width {
              width: auto !important;
            }
      
            #u_content_image_3 .v-src-max-width {
              max-width: 29% !important;
            }
      
            #u_content_heading_3 .v-container-padding-padding {
              padding: 10px 20px !important;
            }
      
            #u_content_heading_3 .v-font-size {
              font-size: 28px !important;
            }
      
            #u_content_text_3 .v-container-padding-padding {
              padding: 10px 22px 26px !important;
            }
      
            #u_content_heading_2 .v-container-padding-padding {
              padding: 22px 22px 10px !important;
            }
      
            #u_content_heading_2 .v-font-size {
              font-size: 24px !important;
            }
          }
      
          @media only screen and (min-width: 620px) {
            .u-row {
              width: 600px !important;
            }
      
            .u-row .u-col {
              vertical-align: top;
            }
      
            .u-row .u-col-18 {
              width: 108px !important;
            }
      
            .u-row .u-col-18p34 {
              width: 110.04px !important;
            }
      
            .u-row .u-col-63p66 {
              width: 381.96px !important;
            }
      
            .u-row .u-col-100 {
              width: 600px !important;
            }
      
          }
      
          @media (max-width: 620px) {
            .u-row-container {
              max-width: 100% !important;
              padding-left: 0px !important;
              padding-right: 0px !important;
            }
      
            .u-row .u-col {
              min-width: 320px !important;
              max-width: 100% !important;
              display: block !important;
            }
      
            .u-row {
              width: calc(100% - 40px) !important;
            }
      
            .u-col {
              width: 100% !important;
            }
      
            .u-col>div {
              margin: 0 auto;
            }
          }
      
          body {
            margin: 0;
            padding: 0;
          }
      
          table,
          tr,
          td {
            vertical-align: top;
            border-collapse: collapse;
          }
      
          p {
            margin: 0;
          }
      
          .ie-container table,
          .mso-container table {
            table-layout: fixed;
          }
      
          * {
            line-height: inherit;
          }
      
          a[x-apple-data-detectors="true"] {
            color: inherit !important;
            text-decoration: none !important;
          }
        </style>
      
      
      
        <!--[if !mso]><!-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700&display=swap" rel="stylesheet" type="text/css">
        <!--<![endif]-->
      
      </head>
      
      <body class="clean-body u_body"
        style="margin: 0;padding: 0;-webkit-text-size-adjust: 100%;background-color: #f9f9f9;color: #000000">
        <!--[if IE]><div class="ie-container"><![endif]-->
        <!--[if mso]><div class="mso-container"><![endif]-->
        <table
          style="border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;min-width: 320px;Margin: 0 auto;background-color: #f9f9f9;width:100%"
          cellpadding="0" cellspacing="0">
          <tbody>
            <tr style="vertical-align: top">
              <td style="word-break: break-word;border-collapse: collapse !important;vertical-align: top">
                <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td align="center" style="background-color: #f9f9f9;"><![endif]-->
      
      
                <div class="u-row-container" id="nyitokep" style="padding: 0px;background-color: transparent">
                  <div class="u-row"
                    style="Margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: #111114;">
                    <div style="border-collapse: collapse;display: table;width: 100%;background-color: transparent;">
                      <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding: 0px;background-color: transparent;" align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:600px;"><tr style="background-color: #111114;"><![endif]-->
      
                      <!--[if (mso)|(IE)]><td align="center" width="600" style="width: 600px;padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;" valign="top"><![endif]-->
                      <div class="u-col u-col-100"
                        style="max-width: 320px;min-width: 600px;display: table-cell;vertical-align: top;">
                        <div
                          style="width: 100% !important;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;">
                          <!--[if (!mso)&(!IE)]><!-->
                          <div
                            style="padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;">
                            <!--<![endif]-->
      
                            <table id="u_content_image_4" style="font-family:Montserrat,sans-serif;" role="presentation"
                              cellpadding="0" cellspacing="0" width="100%" border="0">
                              <tbody>
                                <tr>
                                  <td class="v-container-padding-padding"
                                    style="overflow-wrap:break-word;word-break:break-word;font-family:Montserrat,sans-serif;"
                                    align="left">
      
                                    <table width="100%" cellpadding="0" cellspacing="0" border="0">
                                      <tr>
                                        <td style="padding-right: 0px;padding-left: 0px;" align="center">
      
                                          <img align="center" border="0" src="http://diak.jedlik.eu/~PeacefulParadise/pictures/korulvagott_logo.png" alt="Logo" title="Logo"
                                            style="outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: inline-block !important;border: none;height: auto;float: none;width: 100%;max-width: 100%;"
                                            width="469.8" class="v-src-width v-src-max-width" />
      
                                        </td>
                                      </tr>
                                    </table>
      
                                  </td>
                                </tr>
                              </tbody>
                            </table>
      
                            <!--[if (!mso)&(!IE)]><!-->
                          </div>
                          <!--<![endif]-->
                        </div>
                      </div>
                      <!--[if (mso)|(IE)]></td><![endif]-->
                      <!--[if (mso)|(IE)]></tr></table></td></tr></table><![endif]-->
                    </div>
                  </div>
                </div>
      
      
      
                <div class="u-row-container" style="padding: 0px;background-color: transparent">
                  <div class="u-row"
                    style="Margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: transparent;">
                    <div style="border-collapse: collapse;display: table;width: 100%;background-color: transparent;">
                      <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding: 0px;background-color: transparent;" align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:600px;"><tr style="background-color: transparent;"><![endif]-->
      
                      <!--[if (mso)|(IE)]><td align="center" width="600" style="background-color: #fffefe;width: 600px;padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;" valign="top"><![endif]-->
                      <div class="u-col u-col-100"
                        style="max-width: 320px;min-width: 600px;display: table-cell;vertical-align: top;">
                        <div
                          style="background-color: #fffefe;width: 100% !important;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;">
                          <!--[if (!mso)&(!IE)]><!-->
                          <div
                            style="padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;">
                            <!--<![endif]-->
      
                            <table id="u_content_image_3" style="font-family:Montserrat,sans-serif;" role="presentation"
                        cellpadding="0" cellspacing="0" width="100%" border="0">
                        <tbody>
                          <tr>
                            <td class="v-container-padding-padding"
                              style="overflow-wrap:break-word;word-break:break-word;padding:55px 10px 10px;font-family:Montserrat,sans-serif;"
                              align="left">

                              <table width="100%" cellpadding="0" cellspacing="0" border="0">
                                <tr>
                                  <td style="padding-right: 0px;padding-left: 0px;" align="center">

                                    <img align="center" border="0" src="https://media.istockphoto.com/vectors/mail-post-envelope-icon-shape-postage-letter-logo-symbol-email-sign-vector-id1189293453?k=20&m=1189293453&s=170667a&w=0&h=0qLb01CW7QhspfsfOBzXvzAz0rRB8jT-mMytGkgsqP0=" alt="Tick Icon"
                                      title="Tick Icon"
                                      style="outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: inline-block !important;border: none;height: auto;float: none;width: 23%;"
                                      width="81.2" class="v-src-width v-src-max-width" />

                                  </td>
                                </tr>
                              </table>

                            </td>
                          </tr>
                        </tbody>
                      </table>
      
                            <table id="u_content_heading_3" style="font-family:Montserrat,sans-serif;" role="presentation"
                              cellpadding="0" cellspacing="0" width="100%" border="0">
                              <tbody>
                                <tr>
                                  <td class="v-container-padding-padding"
                                    style="overflow-wrap:break-word;word-break:break-word;padding:10px 55px;font-family:Montserrat,sans-serif;"
                                    align="left">
      
                                    <h1 class="v-font-size"
                                      style="margin: 0px; line-height: 160%; text-align: center; word-wrap: break-word; font-weight: normal; font-family: Montserrat,sans-serif; font-size: 33px;">
                                      <strong>Verify Your E-mail Address<br/></strong>
                                    </h1>
      
                                  </td>
                                </tr>
                              </tbody>
                            </table>
      
                            <table id="u_content_text_3" style="font-family:Montserrat,sans-serif;" role="presentation"
                              cellpadding="0" cellspacing="0" width="100%" border="0">
                              <tbody>
                                <tr>
                                  <td class="v-container-padding-padding"
                                    style="overflow-wrap:break-word;word-break:break-word;padding:10px 60px 50px;font-family:Montserrat,sans-serif;"
                                    align="left">
      
                                    <div
                                      style="color: #444444; line-height: 170%; text-align: center; word-wrap: break-word;">
                                      <p style="font-size: 14px; line-height: 170%;"><span
                                          style="font-size: 16px; line-height: 27.2px;">You are almost ready to get started. 
                                          Please click on the button below to verify your email address to get full access to our services.<br /></span></p>
                                          <p style="font-size: 14px; line-height: 170%;"><span
                                      style="font-size: 16px; line-height: 27.2px;">The link is valid for one day.<br /></span></p>
                                    </div>
      
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                            <table style="font-family:Montserrat,sans-serif;" role="presentation" cellpadding="0"
                              cellspacing="0" width="100%" border="0">
                              <tbody>
                                <tr>
                                  <td class="v-container-padding-padding"
                                    style="overflow-wrap:break-word;word-break:break-word;padding:10px 10px 50px;font-family:Montserrat,sans-serif;"
                                    align="left">
      
                                    <div align="center">
                                      <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0" style="border-spacing: 0; border-collapse: collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;font-family:Montserrat,sans-serif;"><tr><td style="font-family:Montserrat,sans-serif;" align="center"><v:roundrect xmlns:v="urn:schemas-microsoft-com:vml" xmlns:w="urn:schemas-microsoft-com:office:word" href="http://diak.jedlik.eu/~PeacefulParadise/contactus" style="height:47px; v-text-anchor:middle; width:172px;" arcsize="8.5%" stroke="f" fillcolor="#cca250"><w:anchorlock/><center style="color:#FFFFFF;font-family:Montserrat,sans-serif;"><![endif]-->
                                      <a href="' . $activation_link . '" target="_blank"
                                        style="box-sizing: border-box;display: inline-block;font-family:Montserrat,sans-serif;text-decoration: none;-webkit-text-size-adjust: none;text-align: center;color: #FFFFFF; background-color: #cca250; border-radius: 4px;-webkit-border-radius: 4px; -moz-border-radius: 4px; width:auto; max-width:100%; overflow-wrap: break-word; word-break: break-word; word-wrap:break-word; mso-border-alt: none;">
                                        <span style="display:block;padding:14px 33px;line-height:120%;"><strong><span
                                              style="font-size: 16px; line-height: 19.2px;">Verify email now
                                              &rarr;</span></strong></span>
                                      </a>
                                      <!--[if mso]></center></v:roundrect></td></tr></table><![endif]-->
                                    </div>
      
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                            <!--[if (!mso)&(!IE)]><!-->
                          </div>
                          <!--<![endif]-->
                        </div>
                      </div>
                      <!--[if (mso)|(IE)]></td><![endif]-->
                      <!--[if (mso)|(IE)]></tr></table></td></tr></table><![endif]-->
                    
                  </div>
                    
                  </div>
                </div>
                
      
      
                <div class="u-row-container" style="padding: 0px;background-color: transparent">
                  <div class="u-row"
                    style="Margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: #ffffff;">
                    <div style="border-collapse: collapse;display: table;width: 100%;background-color: transparent;">
                      <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding: 0px;background-color: transparent;" align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:600px;"><tr style="background-color: #ffffff;"><![endif]-->
      
                      <!--[if (mso)|(IE)]><td align="center" width="108" style="width: 108px;padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;" valign="top"><![endif]-->
                      <div class="u-col u-col-18"
                        style="max-width: 320px;min-width: 108px;display: table-cell;vertical-align: top;">
                        <div
                          style="width: 100% !important;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;">
                          <!--[if (!mso)&(!IE)]><!-->
                          <div
                            style="padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;">
                            <!--<![endif]-->
      
                            <table style="font-family:Montserrat,sans-serif;" role="presentation" cellpadding="0"
                              cellspacing="0" width="100%" border="0">
                              <tbody>
                                <tr>
                                  <td class="v-container-padding-padding"
                                    style="overflow-wrap:break-word;word-break:break-word;padding:10px;font-family:Montserrat,sans-serif;"
                                    align="left">
      
                                    <table height="0px" align="center" border="0" cellpadding="0" cellspacing="0" width="100%"
                                      style="border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;border-top: 0px solid #ffffff;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%">
                                      <tbody>
                                        <tr style="vertical-align: top">
                                          <td
                                            style="word-break: break-word;border-collapse: collapse !important;vertical-align: top;font-size: 0px;line-height: 0px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%">
                                            <span>&#160;</span>
                                          </td>
                                        </tr>
                                      </tbody>
                                    </table>
      
                                  </td>
                                </tr>
                              </tbody>
                            </table>
      
                            <!--[if (!mso)&(!IE)]><!-->
                          </div>
                          <!--<![endif]-->
                        </div>
                      </div>
                      <!--[if (mso)|(IE)]></td><![endif]-->
                      <!--[if (mso)|(IE)]><td align="center" width="380" style="background-color: #cca250;width: 380px;padding: 20px;border-top: 1px solid #CCC;border-left: 1px solid #CCC;border-right: 1px solid #CCC;border-bottom: 1px solid #CCC;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;" valign="top"><![endif]-->
                      
                      <!--[if (mso)|(IE)]></td><![endif]-->
                      <!--[if (mso)|(IE)]><td align="center" width="110" style="width: 110px;padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;" valign="top"><![endif]-->
                      <div class="u-col u-col-18p34"
                        style="max-width: 320px;min-width: 110px;display: table-cell;vertical-align: top;">
                        <div
                          style="width: 100% !important;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;">
                          <!--[if (!mso)&(!IE)]><!-->
                          <div
                            style="padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;">
                            <!--<![endif]-->
      
                            <table style="font-family:Montserrat,sans-serif;" role="presentation" cellpadding="0"
                              cellspacing="0" width="100%" border="0">
                              <tbody>
                                <tr>
                                  <td class="v-container-padding-padding"
                                    style="overflow-wrap:break-word;word-break:break-word;padding:10px;font-family:Montserrat,sans-serif;"
                                    align="left">
      
                                    <table height="0px" align="center" border="0" cellpadding="0" cellspacing="0" width="100%"
                                      style="border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;border-top: 0px solid #ffffff;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%">
                                      <tbody>
                                        <tr style="vertical-align: top">
                                          <td
                                            style="word-break: break-word;border-collapse: collapse !important;vertical-align: top;font-size: 0px;line-height: 0px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%">
                                            <span>&#160;</span>
                                          </td>
                                        </tr>
                                      </tbody>
                                    </table>
      
                                  </td>
                                </tr>
                              </tbody>
                            </table>
      
                            <!--[if (!mso)&(!IE)]><!-->
                          </div>
                          <!--<![endif]-->
                        </div>
                      </div>
                      <!--[if (mso)|(IE)]></td><![endif]-->
                      <!--[if (mso)|(IE)]></tr></table></td></tr></table><![endif]-->
                    </div>
                  </div>
                </div>
      
      
      
                <div class="u-row-container" style="padding: 0px;background-color: transparent">
                  <div class="u-row"
                    style="Margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: #ffffff;">
                    <div style="border-collapse: collapse;display: table;width: 100%;background-color: transparent;">
                      <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding: 0px;background-color: transparent;" align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:600px;"><tr style="background-color: #ffffff;"><![endif]-->
      
                      <!--[if (mso)|(IE)]><td align="center" width="600" style="width: 600px;padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;" valign="top"><![endif]-->
                      <div class="u-col u-col-100"
                        style="max-width: 320px;min-width: 600px;display: table-cell;vertical-align: top;">
                        <div
                          style="width: 100% !important;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;">
                          <!--[if (!mso)&(!IE)]><!-->
                          <div
                            style="padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;">
                            <!--<![endif]-->
      
                            <table style="font-family:Montserrat,sans-serif;" role="presentation" cellpadding="0"
                              cellspacing="0" width="100%" border="0">
                              <tbody>
                                <tr>
                                  <td class="v-container-padding-padding"
                                    style="overflow-wrap:break-word;word-break:break-word;padding:0px 60px 20px;font-family:Montserrat,sans-serif;"
                                    align="left">
      
                                    <div
                                      style="color: #444444; line-height: 170%; word-wrap: break-word;">
                                      <p style="font-size: 14px; line-height: 170%;"><span
                                          style="font-size: 16px; line-height: 27.2px;">If you have any issues with the button above, copy this link and paste in your web browser:</span>
                                      </p>
                                      
                                    </div>
      
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                            <table style="font-family:Montserrat,sans-serif;" role="presentation" cellpadding="0"
                              cellspacing="0" width="100%" border="0">
                              <tbody>
                                <tr>
                                  <td class="v-container-padding-padding"
                                    style="overflow-wrap:break-word;word-break:break-word;padding:0px 60px 20px;font-family:Montserrat,sans-serif;"
                                    align="left">
      
                                    <div
                                      style="color: #444444; line-height: 170%; word-wrap: break-word;">
                                      <p style="font-size: 14px; line-height: 170%;"><span
                                          style="font-size: 16px; line-height: 27.2px;"> ' . $activation_link . ' </span>
                                      </p>
                                    </div>
      
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                            <!--[if (!mso)&(!IE)]><!-->
                          </div>
                          <!--<![endif]-->
                        </div>
                      </div>
                      <!--[if (mso)|(IE)]></td><![endif]-->
                      <!--[if (mso)|(IE)]></tr></table></td></tr></table><![endif]-->
                    </div>
                  </div>
                </div>
      
      
      
                <div class="u-row-container" style="padding: 0px;background-color: transparent">
                  <div class="u-row"
                    style="Margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: #111114;">
                    <div style="border-collapse: collapse;display: table;width: 100%;background-color: transparent;">
                      <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding: 0px;background-color: transparent;" align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:600px;"><tr style="background-color: #111114;"><![endif]-->
      
                      <!--[if (mso)|(IE)]><td align="center" width="600" style="width: 600px;padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;" valign="top"><![endif]-->
                      <div class="u-col u-col-100"
                        style="max-width: 320px;min-width: 600px;display: table-cell;vertical-align: top;">
                        <div
                          style="width: 100% !important;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;">
                          <!--[if (!mso)&(!IE)]><!-->
                          <div
                            style="padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;">
                            <!--<![endif]-->
      
                            <table style="font-family:Montserrat,sans-serif;" role="presentation" cellpadding="0"
                              cellspacing="0" width="100%" border="0">
                              <tbody>
                                <tr>
                                  <td class="v-container-padding-padding"
                                    style="overflow-wrap:break-word;word-break:break-word;padding:32px 10px 0px;font-family:Montserrat,sans-serif;"
                                    align="left">
      
                                    <div
                                      style="color: #ffffff; line-height: 140%; text-align: center; word-wrap: break-word;">
                                      <p style="font-size: 14px; line-height: 140%;"><span
                                          style="font-size: 18px; line-height: 25.2px;"><strong>Peaceful Paradise Royale
                                            Hotel<br /></strong></span></p>
                                    </div>
      
                                  </td>
                                </tr>
                              </tbody>
                            </table>
      
                            <table style="font-family:Montserrat,sans-serif;" role="presentation" cellpadding="0"
                              cellspacing="0" width="100%" border="0">
                              <tbody>
                                <tr>
                                  <td class="v-container-padding-padding"
                                    style="overflow-wrap:break-word;word-break:break-word;padding:10px;font-family:Montserrat,sans-serif;"
                                    align="left">
      
                                    <div
                                      style="color: #b0b1b4; line-height: 180%; text-align: center; word-wrap: break-word;">
                                      <p style="font-size: 14px; line-height: 180%;">3570 S Las Vegas Blvd, Las Vegas, NV</p>
                                      <p style="font-size: 14px; line-height: 180%;">+18143008324</p>
                                    </div>
      
                                  </td>
                                </tr>
                              </tbody>
                            </table>
      
                            <table style="font-family:Montserrat,sans-serif;" role="presentation" cellpadding="0"
                              cellspacing="0" width="100%" border="0">
                              <tbody>
                                <tr>
                                  <td class="v-container-padding-padding"
                                    style="overflow-wrap:break-word;word-break:break-word;padding:10px;font-family:Montserrat,sans-serif;"
                                    align="left">
      
                                    <table height="0px" align="center" border="0" cellpadding="0" cellspacing="0" width="82%"
                                      style="border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;border-top: 1px solid #9495a7;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%">
                                      <tbody>
                                        <tr style="vertical-align: top">
                                          <td
                                            style="word-break: break-word;border-collapse: collapse !important;vertical-align: top;font-size: 0px;line-height: 0px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%">
                                            <span>&#160;</span>
                                          </td>
                                        </tr>
                                      </tbody>
                                    </table>
      
                                  </td>
                                </tr>
                              </tbody>
                            </table>
      
                            <table style="font-family:Montserrat,sans-serif;" role="presentation" cellpadding="0"
                              cellspacing="0" width="100%" border="0">
                              <tbody>
                                <tr>
                                  <td class="v-container-padding-padding"
                                    style="overflow-wrap:break-word;word-break:break-word;padding:0px 10px 13px;font-family:Montserrat,sans-serif;"
                                    align="left">
      
                                    <div
                                      style="color: #b0b1b4; line-height: 180%; text-align: center; word-wrap: break-word;">
                                      <p style="font-size: 14px; line-height: 180%;">&copy; 2022 All Rights Reserved</p>
                                    </div>
      
                                  </td>
                                </tr>
                              </tbody>
                            </table>
      
                            <!--[if (!mso)&(!IE)]><!-->
                          </div>
                          <!--<![endif]-->
                        </div>
                      </div>
                      <!--[if (mso)|(IE)]></td><![endif]-->
                      <!--[if (mso)|(IE)]></tr></table></td></tr></table><![endif]-->
                    </div>
                  </div>
                </div>
      
      
                <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
              </td>
            </tr>
          </tbody>
        </table>
        <!--[if mso]></div><![endif]-->
        <!--[if IE]></div><![endif]-->
      </body>
      
      </html>';
    // email header
    $headers[] = 'MIME-Version: 1.0';
    $headers[] = 'Content-type: text/html; charset=iso-8859-1';
    
    $headers[] = 'From: Peaceful Paradise <peacefulparadise@diak.jedlik.eu>';
    //$headers[] = 'Cc: peacefulparadiseofficial@gmail.com';
    //$headers[] = 'Bcc: peacefulparadiseofficial@gmail.com';

    // send the email
    mail($email, $subject, $message, implode("\r\n", $headers));

    //file_put_contents('teszt.txt', 'teszt', FILE_APPEND | LOCK_EX);
  }
  public function updateuseremail($oldemail,$newemail){
    $sql = "UPDATE customer SET Email=? WHERE customer.Email = ?";
    $stmt = $this->con->prepare($sql);
    $stmt->bind_param("ss", $newemail,$oldemail);
    $stmt->execute();
  }
  public function delete_user_by_id(int $id, int $active = 0)
  {
    $sql = 'DELETE FROM customer
                WHERE CustomerID =? and active=?';

    $stmt = $this->con->prepare($sql);
    $stmt->bind_param("ii", $id, $active);

    return $stmt->execute();
  }
  public function find_unverified_user(string $activation_code, string $email)
  {
    $sql = 'SELECT Code,Type,Expiry < now() as expired,codes.CustomerID FROM codes INNER JOIN customer on codes.CustomerID = customer.CustomerID WHERE customer.active is null and customer.Email = ? and codes.Type = ?';

    $stmt = $this->con->prepare($sql);

    $codetype = 'activation_code';
    $stmt->bind_param("ss", $email, $codetype);
    $stmt->execute();

    $user = $stmt->get_result();
    $row = $user->fetch_assoc();

    if ($row != null) {
      if (md5($activation_code) === $row['Code']) {
        return $row;
      }
    }
    // verify the password
    return null;
  }
  public function find_unverified_user_fornewacc(int $customerid,string $newacctoken, string $email)
  {

    $sql = 'SELECT Code,Type,Expiry < now() as expired  FROM codes INNER JOIN customer on codes.CustomerID = customer.CustomerID WHERE codes.CustomerID = ? ';

    $stmt = $this->con->prepare($sql);

    $stmt->bind_param("i",$customerid);
    $stmt->execute();

    $user = $stmt->get_result();
    $row = $user->fetch_assoc();

    if ($row != null) {
      if ($row['expired'] == 1) {
        return "expiredtoken";
      }
      if (md5($newacctoken) === $row['Code']) {
        return $row;
      }
    }
    return null;
  }
  public function activate_email(int $user_id): bool
  {
    $sql = 'UPDATE customer
                SET newacc_activated = 1
                WHERE CustomerID=?';

    $stmt = $this->con->prepare($sql);
    $stmt->bind_param("i", $user_id);

    return $stmt->execute();
  }
  
  public function activate_user(int $user_id): bool
  {
    $sql = 'UPDATE customer
                SET active = 1,
                    activated_at = CURRENT_TIMESTAMP
                WHERE CustomerID=?';

    $stmt = $this->con->prepare($sql);
    $stmt->bind_param("i", $user_id);

    return $stmt->execute();
  }
  public function deleteAllExpiredActivationUsers() {
    //SELECT * FROM `customer` where activation_expiry < CURRENT_DATE and active is null and activation_code not like '';
    
  }


  //Password reset
  public function find_existing_email_in_db(string $email)
  {
    $sql = 'SELECT * FROM `customer` where Email like ? and Password not like "" and active not like 0';

    $stmt = $this->con->prepare($sql);

    $stmt->bind_param("s", $email);
    $stmt->execute();

    $user = $stmt->get_result();
    $row = $user->fetch_assoc();

    // verify the password
    return $row;
  }
  public function generate_password_reset_token(): string //megcsinalja a tokent
  {
    return bin2hex(random_bytes(16));
  }
  public function send_password_reset_email(string $email, string $password_reset_token, $baseUrl): void //elkuldi levelben a linket
  {
    $password_reset_link = 'diak.jedlik.eu' . $baseUrl . "/passwordreset?email=$email&password_reset_token=$password_reset_token";

    // set email subject & body
    $subject = 'Restore your account';
    //$message = 'Link: '.$activation_link.'';
    $message = '<!DOCTYPE HTML
        PUBLIC "-//W3C//DTD XHTML 1.0 Transitional //EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
      <html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml"
        xmlns:o="urn:schemas-microsoft-com:office:office">
      
      <head>
        <!--[if gte mso 9]>
      <xml>
        <o:OfficeDocumentSettings>
          <o:AllowPNG/>
          <o:PixelsPerInch>96</o:PixelsPerInch>
        </o:OfficeDocumentSettings>
      </xml>
      <![endif]-->
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="x-apple-disable-message-reformatting">
        <!--[if !mso]><!-->
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!--<![endif]-->
        <title></title>
      
        <style type="text/css">
          table,
          td {
            color: #000000;
          }
      
          a {
            color: #cca250;
            text-decoration: none;
          }
          #nyitokep .u-row {
            padding-top: 25px !important;
            padding-bottom: 25px !important;
            background-color: black !important;
          }
      
          @media (max-width: 480px) {
            #u_content_image_4 .v-src-width {
              width: auto !important;
            }
      
            #u_content_image_4 .v-src-max-width {
              max-width: 100% !important;
            }
      
            #u_content_image_3 .v-container-padding-padding {
              padding: 46px 10px 10px !important;
            }
      
            #u_content_image_3 .v-src-width {
              width: auto !important;
            }
      
            #u_content_image_3 .v-src-max-width {
              max-width: 29% !important;
            }
      
            #u_content_heading_3 .v-container-padding-padding {
              padding: 10px 20px !important;
            }
      
            #u_content_heading_3 .v-font-size {
              font-size: 28px !important;
            }
      
            #u_content_text_3 .v-container-padding-padding {
              padding: 10px 22px 26px !important;
            }
      
            #u_content_heading_2 .v-container-padding-padding {
              padding: 22px 22px 10px !important;
            }
      
            #u_content_heading_2 .v-font-size {
              font-size: 24px !important;
            }
          }
      
          @media only screen and (min-width: 620px) {
            .u-row {
              width: 600px !important;
            }
      
            .u-row .u-col {
              vertical-align: top;
            }
      
            .u-row .u-col-18 {
              width: 108px !important;
            }
      
            .u-row .u-col-18p34 {
              width: 110.04px !important;
            }
      
            .u-row .u-col-63p66 {
              width: 381.96px !important;
            }
      
            .u-row .u-col-100 {
              width: 600px !important;
            }
      
          }
      
          @media (max-width: 620px) {
            .u-row-container {
              max-width: 100% !important;
              padding-left: 0px !important;
              padding-right: 0px !important;
            }
      
            .u-row .u-col {
              min-width: 320px !important;
              max-width: 100% !important;
              display: block !important;
            }
      
            .u-row {
              width: calc(100% - 40px) !important;
            }
      
            .u-col {
              width: 100% !important;
            }
      
            .u-col>div {
              margin: 0 auto;
            }
          }
      
          body {
            margin: 0;
            padding: 0;
          }
      
          table,
          tr,
          td {
            vertical-align: top;
            border-collapse: collapse;
          }
      
          p {
            margin: 0;
          }
      
          .ie-container table,
          .mso-container table {
            table-layout: fixed;
          }
      
          * {
            line-height: inherit;
          }
      
          a[x-apple-data-detectors="true"] {
            color: inherit !important;
            text-decoration: none !important;
          }
        </style>
      
      
      
        <!--[if !mso]><!-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700&display=swap" rel="stylesheet" type="text/css">
        <!--<![endif]-->
      
      </head>
      
      <body class="clean-body u_body"
        style="margin: 0;padding: 0;-webkit-text-size-adjust: 100%;background-color: #f9f9f9;color: #000000">
        <!--[if IE]><div class="ie-container"><![endif]-->
        <!--[if mso]><div class="mso-container"><![endif]-->
        <table
          style="border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;min-width: 320px;Margin: 0 auto;background-color: #f9f9f9;width:100%"
          cellpadding="0" cellspacing="0">
          <tbody>
            <tr style="vertical-align: top">
              <td style="word-break: break-word;border-collapse: collapse !important;vertical-align: top">
                <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td align="center" style="background-color: #f9f9f9;"><![endif]-->
      
      
                <div class="u-row-container" id="nyitokep" style="padding: 0px;background-color: transparent">
                  <div class="u-row"
                    style="Margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: #111114;">
                    <div style="border-collapse: collapse;display: table;width: 100%;background-color: transparent;">
                      <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding: 0px;background-color: transparent;" align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:600px;"><tr style="background-color: #111114;"><![endif]-->
      
                      <!--[if (mso)|(IE)]><td align="center" width="600" style="width: 600px;padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;" valign="top"><![endif]-->
                      <div class="u-col u-col-100"
                        style="max-width: 320px;min-width: 600px;display: table-cell;vertical-align: top;">
                        <div
                          style="width: 100% !important;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;">
                          <!--[if (!mso)&(!IE)]><!-->
                          <div
                            style="padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;">
                            <!--<![endif]-->
      
                            <table id="u_content_image_4" style="font-family:Montserrat,sans-serif;" role="presentation"
                              cellpadding="0" cellspacing="0" width="100%" border="0">
                              <tbody>
                                <tr>
                                  <td class="v-container-padding-padding"
                                    style="overflow-wrap:break-word;word-break:break-word;font-family:Montserrat,sans-serif;"
                                    align="left">
      
                                    <table width="100%" cellpadding="0" cellspacing="0" border="0">
                                      <tr>
                                        <td style="padding-right: 0px;padding-left: 0px;" align="center">
      
                                          <img align="center" border="0" src="http://diak.jedlik.eu/~PeacefulParadise/pictures/korulvagott_logo.png" alt="Logo" title="Logo"
                                            style="outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: inline-block !important;border: none;height: auto;float: none;width: 100%;max-width: 100%;"
                                            width="469.8" class="v-src-width v-src-max-width" />
      
                                        </td>
                                      </tr>
                                    </table>
      
                                  </td>
                                </tr>
                              </tbody>
                            </table>
      
                            <!--[if (!mso)&(!IE)]><!-->
                          </div>
                          <!--<![endif]-->
                        </div>
                      </div>
                      <!--[if (mso)|(IE)]></td><![endif]-->
                      <!--[if (mso)|(IE)]></tr></table></td></tr></table><![endif]-->
                    </div>
                  </div>
                </div>
      
      
      
                <div class="u-row-container" style="padding: 0px;background-color: transparent">
                  <div class="u-row"
                    style="Margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: transparent;">
                    <div style="border-collapse: collapse;display: table;width: 100%;background-color: transparent;">
                      <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding: 0px;background-color: transparent;" align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:600px;"><tr style="background-color: transparent;"><![endif]-->
      
                      <!--[if (mso)|(IE)]><td align="center" width="600" style="background-color: #fffefe;width: 600px;padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;" valign="top"><![endif]-->
                      <div class="u-col u-col-100"
                        style="max-width: 320px;min-width: 600px;display: table-cell;vertical-align: top;">
                        <div
                          style="background-color: #fffefe;width: 100% !important;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;">
                          <!--[if (!mso)&(!IE)]><!-->
                          <div
                            style="padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;">
                            <!--<![endif]-->
      
                            <table id="u_content_image_3" style="font-family:Montserrat,sans-serif;" role="presentation"
                        cellpadding="0" cellspacing="0" width="100%" border="0">
                        <tbody>
                          <tr>
                            <td class="v-container-padding-padding"
                              style="overflow-wrap:break-word;word-break:break-word;padding:55px 10px 10px;font-family:Montserrat,sans-serif;"
                              align="left">

                              <table width="100%" cellpadding="0" cellspacing="0" border="0">
                                <tr>
                                  <td style="padding-right: 0px;padding-left: 0px;" align="center">

                                    <img align="center" border="0" src="https://media.istockphoto.com/vectors/mail-post-envelope-icon-shape-postage-letter-logo-symbol-email-sign-vector-id1189293453?k=20&m=1189293453&s=170667a&w=0&h=0qLb01CW7QhspfsfOBzXvzAz0rRB8jT-mMytGkgsqP0=" alt="Tick Icon"
                                      title="Tick Icon"
                                      style="outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: inline-block !important;border: none;height: auto;float: none;width: 23%;"
                                      width="81.2" class="v-src-width v-src-max-width" />

                                  </td>
                                </tr>
                              </table>

                            </td>
                          </tr>
                        </tbody>
                      </table>
      
                            <table id="u_content_heading_3" style="font-family:Montserrat,sans-serif;" role="presentation"
                              cellpadding="0" cellspacing="0" width="100%" border="0">
                              <tbody>
                                <tr>
                                  <td class="v-container-padding-padding"
                                    style="overflow-wrap:break-word;word-break:break-word;padding:10px 55px;font-family:Montserrat,sans-serif;"
                                    align="left">
      
                                    <h1 class="v-font-size"
                                      style="margin: 0px; line-height: 160%; text-align: center; word-wrap: break-word; font-weight: normal; font-family: Montserrat,sans-serif; font-size: 33px;">
                                      <strong>Set new password<br/></strong>
                                    </h1>
      
                                  </td>
                                </tr>
                              </tbody>
                            </table>
      
                            <table id="u_content_text_3" style="font-family:Montserrat,sans-serif;" role="presentation"
                              cellpadding="0" cellspacing="0" width="100%" border="0">
                              <tbody>
                                <tr>
                                  <td class="v-container-padding-padding"
                                    style="overflow-wrap:break-word;word-break:break-word;padding:10px 60px 50px;font-family:Montserrat,sans-serif;"
                                    align="left">
      
                                    <div
                                      style="color: #444444; line-height: 170%; text-align: center; word-wrap: break-word;">
                                      <p style="font-size: 14px; line-height: 170%;"><span
                                          style="font-size: 16px; line-height: 27.2px;">A request has been received to reset the password for your account.<br /></span></p>
                                          <p style="font-size: 14px; line-height: 170%;"><span
                                      style="font-size: 16px; line-height: 27.2px;">The link is valid for one day.<br /></span></p>
                                    </div>
      
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                            <table style="font-family:Montserrat,sans-serif;" role="presentation" cellpadding="0"
                              cellspacing="0" width="100%" border="0">
                              <tbody>
                                <tr>
                                  <td class="v-container-padding-padding"
                                    style="overflow-wrap:break-word;word-break:break-word;padding:10px 10px 50px;font-family:Montserrat,sans-serif;"
                                    align="left">
      
                                    <div align="center">
                                      <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0" style="border-spacing: 0; border-collapse: collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;font-family:Montserrat,sans-serif;"><tr><td style="font-family:Montserrat,sans-serif;" align="center"><v:roundrect xmlns:v="urn:schemas-microsoft-com:vml" xmlns:w="urn:schemas-microsoft-com:office:word" href="http://diak.jedlik.eu/~PeacefulParadise/contactus" style="height:47px; v-text-anchor:middle; width:172px;" arcsize="8.5%" stroke="f" fillcolor="#cca250"><w:anchorlock/><center style="color:#FFFFFF;font-family:Montserrat,sans-serif;"><![endif]-->
                                      <a href="' . $password_reset_link . '" target="_blank"
                                        style="box-sizing: border-box;display: inline-block;font-family:Montserrat,sans-serif;text-decoration: none;-webkit-text-size-adjust: none;text-align: center;color: #FFFFFF; background-color: #cca250; border-radius: 4px;-webkit-border-radius: 4px; -moz-border-radius: 4px; width:auto; max-width:100%; overflow-wrap: break-word; word-break: break-word; word-wrap:break-word; mso-border-alt: none;">
                                        <span style="display:block;padding:14px 33px;line-height:120%;"><strong><span
                                              style="font-size: 16px; line-height: 19.2px;">Reset password now
                                              &rarr;</span></strong></span>
                                      </a>
                                      <!--[if mso]></center></v:roundrect></td></tr></table><![endif]-->
                                    </div>
      
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                            <!--[if (!mso)&(!IE)]><!-->
                          </div>
                          <!--<![endif]-->
                        </div>
                      </div>
                      <!--[if (mso)|(IE)]></td><![endif]-->
                      <!--[if (mso)|(IE)]></tr></table></td></tr></table><![endif]-->
                    
                  </div>
                    
                  </div>
                </div>
                
      
      
                <div class="u-row-container" style="padding: 0px;background-color: transparent">
                  <div class="u-row"
                    style="Margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: #ffffff;">
                    <div style="border-collapse: collapse;display: table;width: 100%;background-color: transparent;">
                      <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding: 0px;background-color: transparent;" align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:600px;"><tr style="background-color: #ffffff;"><![endif]-->
      
                      <!--[if (mso)|(IE)]><td align="center" width="108" style="width: 108px;padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;" valign="top"><![endif]-->
                      <div class="u-col u-col-18"
                        style="max-width: 320px;min-width: 108px;display: table-cell;vertical-align: top;">
                        <div
                          style="width: 100% !important;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;">
                          <!--[if (!mso)&(!IE)]><!-->
                          <div
                            style="padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;">
                            <!--<![endif]-->
      
                            <table style="font-family:Montserrat,sans-serif;" role="presentation" cellpadding="0"
                              cellspacing="0" width="100%" border="0">
                              <tbody>
                                <tr>
                                  <td class="v-container-padding-padding"
                                    style="overflow-wrap:break-word;word-break:break-word;padding:10px;font-family:Montserrat,sans-serif;"
                                    align="left">
      
                                    <table height="0px" align="center" border="0" cellpadding="0" cellspacing="0" width="100%"
                                      style="border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;border-top: 0px solid #ffffff;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%">
                                      <tbody>
                                        <tr style="vertical-align: top">
                                          <td
                                            style="word-break: break-word;border-collapse: collapse !important;vertical-align: top;font-size: 0px;line-height: 0px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%">
                                            <span>&#160;</span>
                                          </td>
                                        </tr>
                                      </tbody>
                                    </table>
      
                                  </td>
                                </tr>
                              </tbody>
                            </table>
      
                            <!--[if (!mso)&(!IE)]><!-->
                          </div>
                          <!--<![endif]-->
                        </div>
                      </div>
                      <!--[if (mso)|(IE)]></td><![endif]-->
                      <!--[if (mso)|(IE)]><td align="center" width="380" style="background-color: #cca250;width: 380px;padding: 20px;border-top: 1px solid #CCC;border-left: 1px solid #CCC;border-right: 1px solid #CCC;border-bottom: 1px solid #CCC;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;" valign="top"><![endif]-->
                      
                      <!--[if (mso)|(IE)]></td><![endif]-->
                      <!--[if (mso)|(IE)]><td align="center" width="110" style="width: 110px;padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;" valign="top"><![endif]-->
                      <div class="u-col u-col-18p34"
                        style="max-width: 320px;min-width: 110px;display: table-cell;vertical-align: top;">
                        <div
                          style="width: 100% !important;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;">
                          <!--[if (!mso)&(!IE)]><!-->
                          <div
                            style="padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;">
                            <!--<![endif]-->
      
                            <table style="font-family:Montserrat,sans-serif;" role="presentation" cellpadding="0"
                              cellspacing="0" width="100%" border="0">
                              <tbody>
                                <tr>
                                  <td class="v-container-padding-padding"
                                    style="overflow-wrap:break-word;word-break:break-word;padding:10px;font-family:Montserrat,sans-serif;"
                                    align="left">
      
                                    <table height="0px" align="center" border="0" cellpadding="0" cellspacing="0" width="100%"
                                      style="border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;border-top: 0px solid #ffffff;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%">
                                      <tbody>
                                        <tr style="vertical-align: top">
                                          <td
                                            style="word-break: break-word;border-collapse: collapse !important;vertical-align: top;font-size: 0px;line-height: 0px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%">
                                            <span>&#160;</span>
                                          </td>
                                        </tr>
                                      </tbody>
                                    </table>
      
                                  </td>
                                </tr>
                              </tbody>
                            </table>
      
                            <!--[if (!mso)&(!IE)]><!-->
                          </div>
                          <!--<![endif]-->
                        </div>
                      </div>
                      <!--[if (mso)|(IE)]></td><![endif]-->
                      <!--[if (mso)|(IE)]></tr></table></td></tr></table><![endif]-->
                    </div>
                  </div>
                </div>
      
      
      
                <div class="u-row-container" style="padding: 0px;background-color: transparent">
                  <div class="u-row"
                    style="Margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: #ffffff;">
                    <div style="border-collapse: collapse;display: table;width: 100%;background-color: transparent;">
                      <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding: 0px;background-color: transparent;" align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:600px;"><tr style="background-color: #ffffff;"><![endif]-->
      
                      <!--[if (mso)|(IE)]><td align="center" width="600" style="width: 600px;padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;" valign="top"><![endif]-->
                      <div class="u-col u-col-100"
                        style="max-width: 320px;min-width: 600px;display: table-cell;vertical-align: top;">
                        <div
                          style="width: 100% !important;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;">
                          <!--[if (!mso)&(!IE)]><!-->
                          <div
                            style="padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;">
                            <!--<![endif]-->
      
                            <table style="font-family:Montserrat,sans-serif;" role="presentation" cellpadding="0"
                              cellspacing="0" width="100%" border="0">
                              <tbody>
                                <tr>
                                  <td class="v-container-padding-padding"
                                    style="overflow-wrap:break-word;word-break:break-word;padding:0px 60px 20px;font-family:Montserrat,sans-serif;"
                                    align="left">
      
                                    <div
                                      style="color: #444444; line-height: 170%; word-wrap: break-word;">
                                      <p style="font-size: 14px; line-height: 170%;"><span
                                          style="font-size: 16px; line-height: 27.2px;">If you have any issues with the button above, copy this link and paste in your web browser:</span>
                                      </p>
                                      
                                    </div>
      
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                            <table style="font-family:Montserrat,sans-serif;" role="presentation" cellpadding="0"
                              cellspacing="0" width="100%" border="0">
                              <tbody>
                                <tr>
                                  <td class="v-container-padding-padding"
                                    style="overflow-wrap:break-word;word-break:break-word;padding:0px 60px 20px;font-family:Montserrat,sans-serif;"
                                    align="left">
      
                                    <div
                                      style="color: #444444; line-height: 170%; word-wrap: break-word;">
                                      <p style="font-size: 14px; line-height: 170%;"><span
                                          style="font-size: 16px; line-height: 27.2px;"> ' . $password_reset_link . ' </span>
                                      </p>
                                    </div>
      
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                            <!--[if (!mso)&(!IE)]><!-->
                          </div>
                          <!--<![endif]-->
                        </div>
                      </div>
                      <!--[if (mso)|(IE)]></td><![endif]-->
                      <!--[if (mso)|(IE)]></tr></table></td></tr></table><![endif]-->
                    </div>
                  </div>
                </div>
      
      
      
                <div class="u-row-container" style="padding: 0px;background-color: transparent">
                  <div class="u-row"
                    style="Margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: #111114;">
                    <div style="border-collapse: collapse;display: table;width: 100%;background-color: transparent;">
                      <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding: 0px;background-color: transparent;" align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:600px;"><tr style="background-color: #111114;"><![endif]-->
      
                      <!--[if (mso)|(IE)]><td align="center" width="600" style="width: 600px;padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;" valign="top"><![endif]-->
                      <div class="u-col u-col-100"
                        style="max-width: 320px;min-width: 600px;display: table-cell;vertical-align: top;">
                        <div
                          style="width: 100% !important;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;">
                          <!--[if (!mso)&(!IE)]><!-->
                          <div
                            style="padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;">
                            <!--<![endif]-->
      
                            <table style="font-family:Montserrat,sans-serif;" role="presentation" cellpadding="0"
                              cellspacing="0" width="100%" border="0">
                              <tbody>
                                <tr>
                                  <td class="v-container-padding-padding"
                                    style="overflow-wrap:break-word;word-break:break-word;padding:32px 10px 0px;font-family:Montserrat,sans-serif;"
                                    align="left">
      
                                    <div
                                      style="color: #ffffff; line-height: 140%; text-align: center; word-wrap: break-word;">
                                      <p style="font-size: 14px; line-height: 140%;"><span
                                          style="font-size: 18px; line-height: 25.2px;"><strong>Peaceful Paradise Royale
                                            Hotel<br /></strong></span></p>
                                    </div>
      
                                  </td>
                                </tr>
                              </tbody>
                            </table>
      
                            <table style="font-family:Montserrat,sans-serif;" role="presentation" cellpadding="0"
                              cellspacing="0" width="100%" border="0">
                              <tbody>
                                <tr>
                                  <td class="v-container-padding-padding"
                                    style="overflow-wrap:break-word;word-break:break-word;padding:10px;font-family:Montserrat,sans-serif;"
                                    align="left">
      
                                    <div
                                      style="color: #b0b1b4; line-height: 180%; text-align: center; word-wrap: break-word;">
                                      <p style="font-size: 14px; line-height: 180%;">3570 S Las Vegas Blvd, Las Vegas, NV</p>
                                      <p style="font-size: 14px; line-height: 180%;">+18143008324</p>
                                    </div>
      
                                  </td>
                                </tr>
                              </tbody>
                            </table>
      
                            <table style="font-family:Montserrat,sans-serif;" role="presentation" cellpadding="0"
                              cellspacing="0" width="100%" border="0">
                              <tbody>
                                <tr>
                                  <td class="v-container-padding-padding"
                                    style="overflow-wrap:break-word;word-break:break-word;padding:10px;font-family:Montserrat,sans-serif;"
                                    align="left">
      
                                    <table height="0px" align="center" border="0" cellpadding="0" cellspacing="0" width="82%"
                                      style="border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;border-top: 1px solid #9495a7;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%">
                                      <tbody>
                                        <tr style="vertical-align: top">
                                          <td
                                            style="word-break: break-word;border-collapse: collapse !important;vertical-align: top;font-size: 0px;line-height: 0px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%">
                                            <span>&#160;</span>
                                          </td>
                                        </tr>
                                      </tbody>
                                    </table>
      
                                  </td>
                                </tr>
                              </tbody>
                            </table>
      
                            <table style="font-family:Montserrat,sans-serif;" role="presentation" cellpadding="0"
                              cellspacing="0" width="100%" border="0">
                              <tbody>
                                <tr>
                                  <td class="v-container-padding-padding"
                                    style="overflow-wrap:break-word;word-break:break-word;padding:0px 10px 13px;font-family:Montserrat,sans-serif;"
                                    align="left">
      
                                    <div
                                      style="color: #b0b1b4; line-height: 180%; text-align: center; word-wrap: break-word;">
                                      <p style="font-size: 14px; line-height: 180%;">&copy; 2022 All Rights Reserved</p>
                                    </div>
      
                                  </td>
                                </tr>
                              </tbody>
                            </table>
      
                            <!--[if (!mso)&(!IE)]><!-->
                          </div>
                          <!--<![endif]-->
                        </div>
                      </div>
                      <!--[if (mso)|(IE)]></td><![endif]-->
                      <!--[if (mso)|(IE)]></tr></table></td></tr></table><![endif]-->
                    </div>
                  </div>
                </div>
      
      
                <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
              </td>
            </tr>
          </tbody>
        </table>
        <!--[if mso]></div><![endif]-->
        <!--[if IE]></div><![endif]-->
      </body>
      
      </html>';
    // email header
    $headers[] = 'MIME-Version: 1.0';
    $headers[] = 'Content-type: text/html; charset=iso-8859-1';
    
    $headers[] = 'From: Peaceful Paradise <peacefulparadise@diak.jedlik.eu>';
    //$headers[] = 'Cc: peacefulparadiseofficial@gmail.com';
    //$headers[] = 'Bcc: peacefulparadiseofficial@gmail.com';

    // send the email
    mail($email, $subject, $message, implode("\r\n", $headers));

    //echo 'elkuldte a levelet';
  }
  public function update_user_reset_code_in_db(int $user_id, string $password_reset_token, int $expiry = 1 * 24 * 60 * 60): bool
  {
    $sqlselect = 'SELECT * FROM codes WHERE customerID = ? AND Type = "reset_token" ';
    $stmt = $this->con->prepare($sqlselect);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $vane = 0;
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        //oke
      $vane = 1;
    } else {
      $vane = 0;
    }
    if ($vane == 1) {
              $sql = 'UPDATE codes
              SET Code = ?,
              Expiry = ?,
              Type = ?
              WHERE CustomerID=? AND Type = "reset_token"';
    }
    else{
            $sql = 'INSERT INTO codes
            (Code, Expiry, Type, CustomerID)
            VALUES (?,?,?,?)';
    }
    $stmt = $this->con->prepare($sql);
    $token = $password_reset_token;
    $type = "reset_token";
    $exp = date('Y-m-d H:i:s', time() + $expiry);
    $stmt->bind_param("sssi", md5($token), $exp , $type , $user_id);

    return $stmt->execute();
  }
  public function update_newacc_code_in_db(int $user_id, string $newacctoken, int $expiry = 1 * 24 * 60 * 60): bool
  {
    $sqlselect = 'SELECT * FROM codes WHERE customerID = ? AND Type = "newacc" ';
    $stmt = $this->con->prepare($sqlselect);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $vane = 0;
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        //oke
      $vane = 1;
    } else {
      $vane = 0;
    }
    if ($vane == 1) {
              $sql = 'UPDATE codes
              SET Code = ?,
              Expiry = ?,
              Type = ?
              WHERE CustomerID=? AND Type = "newacc" ';

      
    }
    else{
            $sql = 'INSERT INTO codes
            (Code, Expiry, Type, CustomerID)
            VALUES (?,?,?,?)';
    }
    $stmt = $this->con->prepare($sql);
    $token = md5($newacctoken);
    $type = "newacc";
    $exp = date('Y-m-d H:i:s', time() + $expiry);
    $stmt->bind_param("sssi", $token, $exp , $type , $user_id);

    return $stmt->execute();
 
  }
  public function find_resetable_user(string $password_reset_token, string $email) //megkeresi a felhaszn??l??t a link alapj??n ha van
  {
    $sql = 'SELECT Code,Type,Expiry < now() as expired,codes.CustomerID,customer.Email FROM codes INNER JOIN customer on codes.CustomerID = customer.CustomerID where customer.Email = ? and codes.Type = "reset_token"';

    $stmt = $this->con->prepare($sql);

    $stmt->bind_param("s",$email);
    $stmt->execute();

    $user = $stmt->get_result();
    $row = $user->fetch_assoc();

    if ($row != null) {
      if ($row['expired'] == 1) {
        return null;
      }
      if (md5($password_reset_token) === $row['Code']) {
        return $row;
      }
    }
    return null;
  }
  public function verify_new_password(string $newpassword, int $user_id) //bek??ri az ??j jelsz??t ??s lefriss??ti
  {
    $sql = 'SELECT * FROM customer where CustomerID = ? ';

    $stmt = $this->con->prepare($sql);

    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $user = $stmt->get_result();
    $row = $user->fetch_assoc();

    if ($row != null) {
      if ($row['Password'] === md5($newpassword))
      {
        return null;
      }
      else {
        return $row;
      }
    }

    return null;
  }
  public function set_new_password(string $newpassword, int $user_id): bool //bek??ri az ??j jelsz??t ??s lefriss??ti
  {
    $sql = 'UPDATE customer
              SET Password = ?
              WHERE CustomerID = ?';

    $stmt = $this->con->prepare($sql);
    $titkositott = md5($newpassword);
    $stmt->bind_param("si", $titkositott, $user_id);

    return $stmt->execute();
  }
  
}

