<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <title>Clinician's Homepage</title>
    <link rel="shortcut icon" href="/assets/favicon.ico">
    <link rel="icon" href="Consolidation/Pictures/Dentistry Logo.png" type="icon">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="Clinician's Homepage.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <div class="rightside_header">
        <a href="Clinician's Profile.html"><i class="fa-solid fa-user"></i></a>
        <a href="Login3.php"><i class="fa-solid fa-right-from-bracket"></i></a>
    </div>
    <a href="Clinician's Homepage.html"><img draggable="false" class="logo" src="Dentistry Logo.png" alt=""></a>
    <div class="titlepage">
        <a href="Clinician's Homepage.html" class="Headtitle"><h1>CLINICIAN</h1></a>
    </div>
</head>
<body>

    <div class="container">
        <div class="center-content">
            <form action="">
                <fieldset>
                    <legend>Patient List</legend>

                    <a href="PatientInfo/AddPatientRecord.php">+ Add Patient</a>

                    <br>
                    <fieldset>
                        <legend>My Patient List</legend>
                        <p class="legend">✓ - Complete | X - Incomplete</p>
                        <p class="legend"></p>
                        <h2>Adult</h2>

                        <?php
                        include 'conn.php';

                        session_start();
                        // Check if the session variable is set
                        if (isset($_SESSION['userID'])) {
                        // Fetch the value of $_SESSION['userID']
                         $userID = $_SESSION['userID'];
                        }
                        $prophy1 = 10; $resto1 = 20; $prostho1 = 30; $surgery1 = 40; $endo1 = 50; $perio1 = 60;

                        echo "<table border=2>
                        <tr><th>Patient's #</th>
                            <th>Patient's Name</th>
                            <th>Prophylaxis</th>
                            <th>Restorative</th>
                            <th>Prosthodontic</th>
                            <th>Surgery</th>
                            <th>Endodontic</th>
                            <th>Periodontic(Optional)</th>
                        </tr>";

                        $sql = "SELECT tblpatientinfo.trans_num, tblpatientinfo.PatiFname, tblpatientinfo.PatiLname, tblformstatus.prophylaxis, tblformstatus.restorative, tblformstatus.prosthodontic, tblformstatus.surgery, tblformstatus.endodontic, tblformstatus.periodontic FROM tblpatientinfo LEFT JOIN tblformstatus ON tblpatientinfo.clinicianID=tblformstatus.clinicianID WHERE tblpatientinfo.clinicianID = '$userID'";
                        $res = mysqli_query($conn, $sql);
                        
                        while($row = mysqli_fetch_assoc($res)) {
                            echo "<tr>
                                <td>" .$row["trans_num"]. "</td>
                                <td>" .$row["PatiFname"]. '&nbsp' .$row["PatiLname"]. "</td>
                                <td><a href='Oral_Prophylaxis_Form Completed.html?prophy=$prophy1'>" . ($row['prophylaxis'] == 1 ? '✓' : 'X') . "</a></td>
                                <td><a href='Restorative Section.html?resto=$resto1'>" . ($row['restorative'] == 1 ? '✓' : 'X') . "</a></td>
                                <td><a href='Prosthodontic/Prosthodontic_Clinic-Complete_Denture_I&II.php?prostho=$prostho1'>" . ($row['prosthodontic'] == 1 ? '✓' : 'X') . "</a></td>
                                <td><a href='Oral_Surgery_Section-1.html?surgery=$surgery1'>" . ($row['surgery'] == 1 ? '✓' : 'X') . "</a></td>
                                <td><a href='Endo-Perio_Section-1.html?endo=$endo1'>" . ($row['endodontic'] == 1 ? '✓' : 'X') . "</a></td>
                                <td><a href='Periodontic_Form-1.html?perio=$perio1'>" . ($row['periodontic'] == 1 ? '✓' : 'X') . "</a></td>
                                </tr>";
                        }

                        echo "</table>"
                        ?>

                        <input type="hidden" name="teethValue" value="<?php echo ($userID); ?>">

                        <h2>Pedo</h2>
                        <?php
                        echo "<table border='2'>
                        <tr><th>Patient's #</th>
                            <th>Patient's Name</th>
                            <th>Patient Record</th>
                            <th>Diagnostic</th>
                        <tr>";

                        echo "</table>"
                        ?>
                
            </fieldset>
            <br>
            <fieldset>
            <legend>Borrowed Patient List</legend>
            <h2>Borrowed Patient Adult</h2>
            <table border="2">
                <tr>
                    <th>Patient's #</th>
                    <th>Patient's Name</th>
                    <th>Clinician</th>
                    <th>Prophylaxis</th>
                    <th>Restorative</th>
                    <th>Prosthodontic</th>
                    <th>Surgery</th>
                    <th>Endodontic</th>
                    <th>Periodontic(Optional)</th>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Juan Dela Cruz</td>
                    <td>Joshua Castillo</td>
                    <td><a href="Oral_Prophylaxis_Form Completed.html">✓</a></td>
                    <td><a href="Restorative Section.html">X</a></td>
                    <td><a href="Prosthodontic_Clinic-Complete_Denture_I&II.html">X</a></td>
                    <td><a href="Oral_Surgery_Section-1.html">X</a></td>
                    <td><a href="Endo-Perio_Section-1.html">X</a></td>
                    <td><a href="Periodontic_Form-1.html">X</a></td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Olivia Santos</td>
                    <td>Angel Fajardo</td>
                    <td><a href="Oral_Prophylaxis_Form Completed.html">✓</a></td>
                    <td><a href="Restorative Section.html">X</a></td>
                    <td><a href="Prosthodontic_Clinic-Complete_Denture_I&II.html">X</a></td>
                    <td><a href="Oral_Surgery_Section-1.html">X</a></td>
                    <td><a href="Endo-Perio_Section-1.html">X</a></td>
                    <td><a href="Periodontic_Form-1.html">X</a></td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Liam Reyes</td>
                    <td>Cedric Laput</td>
                    <td><a href="Oral_Prophylaxis_Form Completed.html">✓</a></td>
                    <td><a href="Restorative Section.html">X</a></td>
                    <td><a href="Prosthodontic_Clinic-Complete_Denture_I&II.html">X</a></td>
                    <td><a href="Oral_Surgery_Section-1.html">X</a></td>
                    <td><a href="Endo-Perio_Section-1.html">X</a></td>
                    <td><a href="Periodontic_Form-1.html">X</a></td>
                </tr>
            </table>
            <h2>Borrowed Patient Pedo</h2>
            <table border="2">
                <tr>
                    <th>Patient's #</th>
                    <th>Patient's Name</th>
                    <th>Clinician</th>
                    <th>Patient Record</th>
                    <th>Diagnostic</th>
                <tr>
                    <td>1</td>
                    <td>Juan Dela Cruz</td>
                    <td>Jereyko Dela Cruz</td>
                    <td><a href="Child_Patient_Record-1.html">✓</a></td>
                    <td><a href="Child_Diagnostic_Form-1.html">X</a></td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Olivia Santos</td>
                    <td>Marwin Roxas</td>
                    <td><a href="Child_Patient_Record-1.html">✓</a></td>
                    <td><a href="Child_Diagnostic_Form-1.html">X</a></td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Liam Reyes</td>
                    <td>Jan Ray Villado</td>
                    <td><a href="Child_Patient_Record-1.html">✓</a></td>
                    <td><a href="Child_Diagnostic_Form-1.html">X</a></td>
                </tr>
            </table>
            </fieldset>
            </fieldset>
            </form>
            <br>
            <form action="">
            <fieldset>
                <legend>Search Patient List</legend>
                <div class="search">
                    <form class="searchform">
                    <form class="searchform">
                        <i class="fa fa-search"></i>
                        <input type="text" class="searchbar" placeholder="Search Patient...">
                        <a href="#"><button type="submit" class="searchbutton">Search</button></a>
                        <div class="form-section">
                            <label for="radio-button-1" class="form_radio">Adult
                                <input type="radio" id="radio-button-1" name="radio-option" onclick="handleRadioButtonClick()">
                                <span class="radiomark"></span></label>
                              </div>
                          
                          <div id="additional-fields-1" class="form-section additional-fields">
                            <!-- Additional fields for Option 1 -->
                            <label for="field1">Complete</label>
                            <input type="radio" id="field1">
                            <label for="field2">Incomplete</label>
                            <input type="radio" id="field2"><br>
                            <label for="field1">Prophylaxis:</label>
                            <input type="checkbox" id="field1">
                            <label for="field1">Restorative:</label>
                            <input type="checkbox" id="field1">
                            <label for="field1">Prosthodontic:</label>
                            <input type="checkbox" id="field1">
                            <label for="field1">Surgery:</label>
                            <input type="checkbox" id="field1">
                            <label for="field1">Endodontic:</label>
                            <input type="checkbox" id="field1">
                            <label for="field1">Periodontic(Optional):</label>
                            <input type="checkbox" id="field1">
                          </div>
                          
                          <div class="form-section">
                            <label for="radio-button-2" class="form_radio">Pedo
                            <input type="radio" id="radio-button-2" name="radio-option" onclick="handleRadioButtonClick()">
                            <span class="radiomark"></span></label>
                          </div>
                          
                          <div id="additional-fields-2" class="form-section additional-fields">
                            <!-- Additional fields for Option 2 -->
                            <label for="field2">Complete</label>
                            <input type="radio" id="field2">
                            <label for="field1">Incomplete</label>
                            <input type="radio" id="field2"><br>
                            <label for="field1">Patient Record:</label>
                            <input type="checkbox" id="field1">
                            <label for="field1">Diagnostic:</label>
                            <input type="checkbox" id="field1">
                          </div>
                          <table border="2">
                            <tr>
                                <th colspan="4">Adult</th>
                                <th colspan="4">Pedo</th>
                            </tr>
                            <tr>
                                <th>Patient's #</th>
                                <th>Patient's Name</th>
                                <th>Clinician</th>
                                <th>Request</th>
                                <th>Patient's #</th>
                                <th>Patient's Name</th>
                                <th>Clinician</th>
                                <th>Request</th>
                            </tr>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>Juan Dela Cruz</td>
                                <td>Jereyko Dela Cruz</td>
                                <td><input type="checkbox"></td>
                                <td>1</td>
                                <td>Juan Dela Cruz</td>
                                <td>Jereyko Dela Cruz</td>
                                <td><input type="checkbox"></td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Olivia Santos</td>
                                <td>Jan Ray Villado</td>
                                <td><input type="checkbox"></td>
                                <td>2</td>
                                <td>Olivia Santos</td>
                                <td>Jan Ray Villado</td>
                                <td><input type="checkbox"></td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Liam Reyes</td>
                                <td>Marwin Roxas</td>
                                <td><input type="checkbox"></td>
                                <td>3</td>
                                <td>Liam Reyes</td>
                                <td>Marwin Roxas</td>
                                <td><input type="checkbox"></td>
                            </tr>
                            <tr>
                                <td style="border: none;"></td>
                                <td style="border: none;"></td>
                                <td style="border: none;"></td>
                                <td style="border: none;"><button type="submit" class="searchbutton ">Submit</button></td>
                                <td style="border: none;"></td>
                                <td style="border: none;"></td>
                                <td style="border: none;"></td>
                                <td style="border: none;"><button type="submit" class="searchbutton ">Submit</button></td>
                            </tr>
                        </table>
                    </form>
                </div>
            </fieldset>
            </form>
    </div>
    <div class="right-sidebar">
      <form action="">

  </form>
</div>
      </div>
      <script src="Clinician's Homepage.js"></script>
    </body>
    </html>
    