<head>

    <style>
        .marquee-container {
            width: 100%;
            overflow: hidden;
            white-space: nowrap;
            position: relative;
            box-sizing: border-box;
            background-color: yellow;
        }

        .marquee-content {
            display: inline-block;
            animation: marquee-bounce 74s linear infinite;
        }

        @keyframes marquee-bounce {

            0%,
            100% {
                transform: translateX(0);
            }

            50% {
                transform: translateX(100%);
            }
        }
    </style>
</head>
<?php

include "../assets/constant/config.php";

global $lang;

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["language"])) {
        $_SESSION["language"] = $_POST["language"];
    }
}
$lang = $_SESSION['language'] === 'vi' ? include "../assets/locales/vi/lang.php" : include "../assets/locales/en/lang.php";
$stmt = $conn->prepare("SELECT * FROM `login` ");
//print_r($stmt); exit;
$stmt->execute();
$record = $stmt->fetchAll();
foreach ($record

as $key) {
?>

<div class="topbar">

    <nav class="navbar-custom">
        <div class="marquee-container" style="margin-top: 20px;" onmouseover="stopMarquee(this)"
             onmouseout="startMarquee(this)">
        </div>


        <script>
            function stopMarquee(element) {
                var marqueeContent = element.querySelector('.marquee-content');
                marqueeContent.style.animationPlayState = 'paused';
            }

            function startMarquee(element) {
                var marqueeContent = element.querySelector('.marquee-content');
                marqueeContent.style.animationPlayState = 'running';
            }
        </script>
        <ul class="list-inline menu-left float-left mb-0">
            <li class="float-left">
                <button class="button-menu-mobile open-left waves-light waves-effect">
                    <i class="mdi mdi-menu"></i>
                </button>
            </li>
            <li class="list-inline-item mt-4">
                <b id="time" class="ml-lg-5 pl-lg-5 d-none d-md-block"></b>
            </li>
        </ul>


        <ul class="list-inline float-right mb-0">
            <!-- language-->

            <!--        <li class="list-inline-item google-multi languge-list">-->
            <!--          <div id="google_translate_element">-->
            <!---->
            <!--
               </li>-->

            <!-- language-->



            <li class="list-inline-item dropdown notification-list">
                <a class="nav-link dropdown-toggle arrow-none waves-effect nav-user" data-toggle="dropdown" href="#"
                   role="button" aria-haspopup="false" aria-expanded="false">
                    <img src="../assets/images/<?php echo $key['image'] ?>" alt="user" class="rounded-circle">
                </a><?php } ?>

                <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                    <!-- item-->
                    <div class="dropdown-item noti-title">
                        <h5><?php echo $lang['header']['welcome'] ?></h5>
                    </div>
                    <a class="dropdown-item" href="profile.php"><i class="mdi mdi-account-circle m-r-5 text-muted"></i>
                        <?php echo $lang['header']['profile'] ?> </a>
                    <a class="dropdown-item" href="changepass.php"><i
                                class="mdi mdi-lock-open-outline m-r-5 text-muted"></i><?php echo $lang['header']['change_password'] ?>  </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="../logout.php"><i class="mdi mdi-logout m-r-5 text-muted"></i><?php echo $lang['header']['logout'] ?> </a>
                </div>
            </li>

        </ul>
        <ul class="list-inline menu-left float-right mb-0 w-25">
             <span class="localize p-2 mr-2 form-group " id="languageDropdown">
              <form id="languageForm" action="">
                <select name="languageSelect" id="languageSelect" class="form-control">
                  <option value=""><?php echo $lang['header']['choose_language'] ?></option>
                  <option value="vi"><?php echo $lang['header']['vietnamese'] ?> </option>
                  <option value="en"><?php echo $lang['header']['english'] ?></option>
                    <!-- Add more options for other languages as needed -->
                </select>
              </form>
            </span>
        </ul>

        <div class="clearfix"></div>

    </nav>

</div>

