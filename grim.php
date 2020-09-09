<?php
error_reporting(0);
require 'functions.php';
require 'var.php';
echo $cln;
function update()
    {
        echo "\n\e[91m\e[1m[+] GRIM UPDATE UTILITY [+]\nUpdate in progress, please wait...\n\n$cln";
        system("git fetch origin && git reset --hard origin/master && git clean -f -d");
        echo $bold . $fgreen . "[i] Job finished successfully! Please Restart GRIM \n" . $cln;
        exit;
    }
    
system("clear");
grim_banner();
if (extension_loaded('curl') || extension_loaded('dom'))
  {
  }
else
  {
    if (!extension_loaded('curl'))
      {
        echo $bold . $red . "\n[!] cURL Module Is Missing! Try 'fix' command OR Install php-curl" . $cln;
      }
    if (!extension_loaded('dom'))
      {
        echo $bold . $red . "\n[!] DOM Module Is Missing! Try 'fix' command OR Install php-xml\n" . $cln;
      }
  }
thephuckinstart:
echo "\n";
userinput(" NOTE - PUT WEBSITE IN THIS FORMAT -> site.com AND DON'T PUT HTTP OR HTTPS HERE
     ENTER THE WEBSITE FOR SCANNING ");
$ip = trim(fgets(STDIN, 1024));
if ($ip == "help")
  {
    echo "\n\n[+] GRIM Help Screen [+] \n\n";
    echo $bold . $lblue . "Commands\n";
    echo "========\n";
    echo $fgreen . "[1] help:$cln View The Help Menu\n";
    echo $bold . $fgreen . "[2] fix:$cln Installs All Required Modules (Suggested If You Are Running The Tool For The First Time)\n";
    echo $bold . $fgreen . "[3] URL:$cln Enter The Domain Name Which You Want To Scan (Format:www.sample.com / sample.com)\n";
    echo $bold . $fgreen . "[4] update:$cln Updates The Script To The Newest Version Available.\n";
    goto thephuckinstart;
  }
elseif ($ip == "fix")
  {
    echo "\n\e[91m\e[1m[+] GRIM FiX MENU [+]\n\n$cln";
    echo $bold . $blue . "[+] Checking If CURL module is installed ...\n";
    if (!extension_loaded('curl'))
      {
        echo $bold . $red . "[!] CURL MODULE IS NOT INSTALLED SEE THE README AND INSTALL REQUIRED PACKAGES MANUALLY ! \n";
        echo $yellow . "[*] Installing CURL. (Operation requires sudo permission so you might be asked for password) \n" . $cln;
        system("sudo apt-get -qq --assume-yes install php-curl");
        echo $bold . $fgreen . "[i] CURL Installed. \n";
      }
    else
      {
        echo $bold . $fgreen . "[i] CURL is already installed, Skipping To Next \n";
      }
    echo $bold . $blue . "[+] Checking If php-XML module is installed ...\n";
    if (!extension_loaded('dom'))
      {
        echo $bold . $red . "[!] php-XML MODULE IS NOT INSTALLED SEE THE README AND INSTALL REQUIRED PACKAGES MANUALLY ! \n";
        echo $yellow . "[*] Installing php-XML. (Operation requires sudo permission so you might be asked for password) \n" . $cln;
        system("sudo apt-get -qq --assume-yes install php-xml");
        echo $bold . $fgreen . "[i] DOM Installed. \n";
      }
    else
      {
        echo $bold . $fgreen . "[i] php-XML is already installed, You Are All SET ;) \n";
      }
    echo $bold . $fgreen . "[i] Job finished successfully! Please Restart GRIM \n";
    exit;
  }
elseif ($ip == "update")
  {
    update();
  }

elseif (strpos($ip, '://') !== false)
  {
    echo $bold . $red . "\n[!] (HTTP/HTTPS) Detected In Input! Enter URL Without Http/Https\n" . $CURLOPT_RETURNTRANSFER;
    goto thephuckinstart;
  }
elseif (strpos($ip, '.') == false)
  {
    echo $bold . $red . "\n[!] Invalid URL Format! Enter A Valid URL\n" . $cln;
    goto thephuckinstart;
  }
elseif (strpos($ip, ' ') !== false)
  {
    echo $bold . $red . "\n[!] Invalid URL Format! Enter A Valid URL\n" . $cln;
    goto thephuckinstart;
  }
else
  {
    echo "\n";
    userinput("Enter 1 For HTTP OR Enter 2 For HTTPS");
    echo $cln . $bold . $fgreen;
    $ipsl = trim(fgets(STDIN, 1024));
    if ($ipsl == "2")
      {
        $ipsl = "https://";
      }
    else
      {
        $ipsl = "http://";
      }
scanlist:

    system("clear");
    echo $bold . $orange . "
                 _,.-------.,_
             ,;~'             '~;,
           ,;                     ;,
          ;                         ;
         ,'                         ',
        ,;                           ;,
        ; ;                         ; ;           ██████╗ ██████╗ ██╗███╗   ███╗
        | ;   ______       ______   ; |          ██╔════╝ ██╔══██╗██║████╗ ████║
        |  `/         .           \'  |          ██║  ███╗██████╔╝██║██╔████╔██║
        |  ~  ,-~~~^~, | ,~^~~~-,  ~  |          ██║   ██║██╔══██╗██║██║╚██╔╝██║
        |   |        }:{        |   |            ╚██████╔╝██║  ██║██║██║ ╚═╝ ██║
        |   l       / | \       !   |             ╚═════╝ ╚═╝  ╚═╝╚═╝╚═╝     ╚═╝
        .~  (__,.--       --.,__)  ~.                        |
        |     ---;' / | \ `;---     |                        |
         \__.       \/^\/       .__/                         |
          V| \                 / |V                          v
           | |T~\___!___!___/~T| |           INFORMATION GATHERING AND VULNERABILITY FETCHING TOOL
           | |`IIII_I_I_I_IIII'| |           ------X-BY NANDYDARK-X------
           |  \,III I I I III,/  |
            \   `~~~~~~~~~~'    /            YOU CAN JOIN OUR GROUP ON TELEGRAM AS @globalblackhat
              \   .       .   /              
                \.    ^    ./
                  ^~~~^~~~^

            $lwhite Scanning Site : " . $fgreen . $ipsl . $ip . $blue . "
      \n\n";
    echo $green . " [A]  FOR STARTING THE SCANNING \n$white [B]  GO BACK FOR SELECTING OTHER SITE \n$red [Q]  QUIT! \n\n" . $cln;
askscan:
    userinput("CHOOSE AND PUT ANY ONE OPTION");
    $scan = trim(fgets(STDIN, 1024));

    if (!in_array($scan, array(
        'A',
        'B',
        'Q',
        'a',
        'b',
        'q',
    ), true))
      {
        echo $bold . $red . "\n[!] Invalid Input! Please Enter a Valid Option! \n\n" . $cln;
        goto askscan;
      }
    else
      {
        if ($scan == "15")
          {
            goto thephuckinstart;
          }
        elseif ($scan == 'q' | $scan == 'Q')
          {
            echo "\n\n\t THANKS FOR USING GRIM x_x, YOU CAN JOIN US ON TELEGRAM GROUP TOO :)\n\n";
            die();
          }
        elseif ($scan == 'b' || $scan == 'B')
          {
            system("clear");
            goto thephuckinstart;
          }
        elseif ($scan == "F" || $scan == "f"){
          echo "\n\e[91m\e[1m[+] GRIM FiX MENU [+]\n\n$cln";
          echo $bold . $blue . "[+] Checking If cURL module is installed ...\n";
          if (!extension_loaded('curl'))
            {
              echo $bold . $red . "[!] cURL Module Not Installed ! \n";
              echo $yellow . "[*] Installing cURL. (Operation requeires sudo permission so you might be asked for password) \n" . $cln;
              system("sudo apt-get -qq --assume-yes install php-curl");
              echo $bold . $fgreen . "[i] cURL Installed. \n";
            }
          else
            {
              echo $bold . $fgreen . "[i] cURL is already installed, Skipping To Next \n";
            }
          echo $bold . $blue . "[+] Checking If php-XML module is installed ...\n";
          if (!extension_loaded('dom'))
            {
              echo $bold . $red . "[!] php-XML Module Not Installed ! \n";
              echo $yellow . "[*] Installing php-XML. (Operation requeires sudo permission so you might be asked for password) \n" . $cln;
              system("sudo apt-get -qq --assume-yes install php-xml");
              echo $bold . $fgreen . "[i] DOM Installed. \n";
            }
          else
            {
              echo $bold . $fgreen . "[i] php-XML is already installed, You Are All SET ;) \n";
            }
          echo $bold . $fgreen . "[i] Job finished successfully! Please Restart GRIM \n";
          exit;
        }
        elseif ($scan == "A" || $scan == "a")
          {

            echo "\n$cln" . "$lyellow" . "[+] Scanning Begins ... \n";
            echo "$blue" . "[i] Scanning Site:\e[92m $ipsl" . "$ip \n";
            echo "\n\n";

            echo "\n$bold" . "$lblue" . "B A S I C   I N F O \n";
            echo "--------------->\n";
            echo "\n\e[0m";

            $reallink = $ipsl . $ip;
            $srccd    = file_get_contents($reallink);
            $lwwww    = str_replace("www.", "", $ip);

            echo "\n$yellow" . "[+] Site Title: ";
            echo "\e[92m";
            echo getTitle($reallink);
            echo "\e[0m";


            $wip = gethostbyname($ip);
            echo "\n$yellow" . "[+] IP address: ";
            echo "\e[92m";
            echo $wip . "\n\e[0m";

            echo "$yellow" . "[+] Web Server: ";
            WEBserver($reallink);
            echo "\n";

            echo "$yellow" . "[+] CMS: \e[92m" . CMSdetect($reallink) . " \e[0m";

            echo "\n$yellow" . "[+] Cloudflare: ";
            cloudflaredetect($reallink);

            echo "$yellow" . "[+] Robots File:$cln ";
            robotsdottxt($reallink);
            echo "\n\n$cln";
            echo "\n\n$bold" . $lblue . "W H O I S   L O O K U P\n";
            echo "--------------->";
            echo "\n\n$cln";
            $urlwhois    = "http://api.hackertarget.com/whois/?q=" . $lwwww;
            $resultwhois = file_get_contents($urlwhois);
            echo "\t";
            echo $resultwhois;
            echo "\n\n$cln";

            echo "\n\n$bold" . $lblue . "G E O  I P  L O O K  U P\n";
            echo "--------------->";
            echo "\n\n$cln";
            $urlgip    = "http://api.hackertarget.com/geoip/?q=" . $lwwww;
            $resultgip = readcontents($urlgip);
            $geoips    = explode("\n", $resultgip);
            foreach ($geoips as $geoip)
              {
                echo $bold . $green . "[i]$cln $geoip \n";
              }
            echo "\n\n$cln";

            echo "\n\n$bold" . $lblue . "H T T P   H E A D E R S\n";
            echo "--------------->";
            echo "\n\n$cln";
            gethttpheader($reallink);
            echo "\n\n";

            echo "\n\n$bold" . $lblue . "D N S   L O O K U P\n";
            echo "--------------->";
            echo "\n\n$cln";
            $urldlup    = "http://api.hackertarget.com/dnslookup/?q=" . $lwwww;
            $resultdlup = file_get_contents($urldlup);
            echo $resultdlup;
            echo "\n\n";

            echo "\n\n$bold" . $lblue . "S U B N E T   C A L C U L A T I O N\n";
            echo "--------------->";
            echo "\n\n$cln";
            $urlscal    = "http://api.hackertarget.com/subnetcalc/?q=" . $lwwww;
            $resultscal = file_get_contents($urlscal);
            echo $resultscal;
            echo "\n\n";

            echo "\n\n$bold" . $lblue . "N M A P   P O R T   S C A N\n";
            echo "--------------->";
            echo "\n\n$cln";
            $urlnmap    = "http://api.hackertarget.com/nmap/?q=" . $lwwww;
            $resultnmap = file_get_contents($urlnmap);
            echo $resultnmap;
            echo "\n";

            echo "\n\n$bold" . $lblue . "S U B - D O M A I N   F I N D E R\n";
            echo "--------------->";
            echo "\n\n";
            $urlsd      = "http://api.hackertarget.com/hostsearch/?q=" . $lwwww;
            $resultsd   = file_get_contents($urlsd);
            $subdomains = trim($resultsd, "\n");
            $subdomains = explode("\n", $subdomains);
            unset($subdomains['0']);
            $sdcount = count($subdomains);
            echo "\n$yellow" . "[i] Total Subdomains Found :$cln " . $green . $sdcount . "\n\n$cln";
            foreach ($subdomains as $subdomain)
              {
                echo "[+] Subdomain:$cln $fgreen" . (str_replace(",", "\n\e[0m[-] IP:$cln $fgreen", $subdomain));
                echo "\n\n$cln";
              }
            echo "\n\n";

            echo "\n\n$bold" . $lblue . "R E V E R S E   I P   L O O K U P\n";
            echo "--------------->";
            echo "\n\n";
            $sth = 'http://domains.yougetsignal.com/domains.php';
            $ch  = curl_init($sth);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, "remoteAddress=$ip&ket=");
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_setopt($ch, CURLOPT_POST, 1);
            $resp  = curl_exec($ch);
            $resp  = str_replace("[", "", str_replace("]", "", str_replace("\"\"", "", str_replace(", ,", ",", str_replace("{", "", str_replace("{", "", str_replace("}", "", str_replace(", ", ",", str_replace(", ", ",", str_replace("'", "", str_replace("'", "", str_replace(":", ",", str_replace('"', '', $resp)))))))))))));
            $array = explode(",,", $resp);
            unset($array[0]);
            echo "\n$yellow" . "[i] Total Sites Found On This Server :$cln " . $green . count($array) . "\n\n$cln";
            foreach ($array as $izox)
              {
                echo "\n$yellow" . "[#]$cln " . $fgreen . $izox . $cln;
                echo "\n$yellow" . "[-] CMS:$cln $green";
                $cmsurl = "http://" . $izox;
                $cmssc  = file_get_contents($cmsurl);
                if (strpos($cmssc, '/wp-content/') !== false)
                  {
                    $tcms = "WordPress";
                  }
                else
                  {
                    if (strpos($cmssc, 'Joomla') !== false)
                      {
                        $tcms = "Joomla";
                      }
                    else
                      {
                        $drpurl = "http://" . $izox . "/misc/drupal.js";
                        $drpsc  = file_get_contents($drpurl);
                        if (strpos($drpsc, 'Drupal') !== false)
                          {
                            $tcms = "Drupal";
                          }
                        else
                          {
                            if (strpos($cmssc, '/skin/frontend/') !== false)
                              {
                                $tcms = "Magento";
                              }
                            else
                              {
                                $tcms = $red . "Could Not Detect$cln ";
                              }
                          }
                      }
                  }
                echo $tcms . "\n";
              }

            echo "\n\n";
            echo "\n\n$bold" . $lblue . "S Q L   V U L N E R A B I L I T Y   S C A N N E R\n";
            echo "--------------->$cln";
            echo "\n";
            $lulzurl = $ipsl . $ip;
            $html    = file_get_contents($lulzurl);
            $dom     = new DOMDocument;
            @$dom->loadHTML($html);
            $links = $dom->getElementsByTagName('a');
            $vlnk  = 0;
            foreach ($links as $link)
              {
                $lol = $link->getAttribute('href');
                if (strpos($lol, '?') !== false)
                  {
                    echo "\n$yellow [#] " . $fgreen . $lol . "\n$cln";
                    echo $yellow . " [-] Searching For SQL Errors: ";
                    $sqllist = file_get_contents('sqlerrors.ini');
                    $sqlist  = explode(',', $sqllist);
                    if (strpos($lol, '://') !== false)
                      {
                        $sqlurl = $lol . "'";
                      }
                    else
                      {
                        $sqlurl = $ipsl . $ip . "/" . $lol . "'";
                      }
                    $sqlsc = file_get_contents($sqlurl);
                    $sqlvn = "$red Not Found";
                    foreach ($sqlist as $sqli)
                      {
                        if (strpos($sqlsc, $sqli) !== false)
                            $sqlvn = "$green Found!";
                      }
                    echo $sqlvn;
                    echo "\n$cln";
                    echo "\n";
                    $vlnk++;
                  }
              }
            echo "\n\n$blue [+] URL(s) With Parameter(s):" . $green . $vlnk;
            echo "\n\n";

            echo "\n\n$bold" . $lblue . "C R A W L E R \n";
            echo "--------------->";
            echo "\n\n";
            echo "\nCrawling Types & Descriptions:$cln";
            echo "\n\n$bold" . "69:$cln THIS 69 TYPE CRAWLER IS LITE VERSION SCANNER AND SCANNES LESS,SO I PREFER YOU TO USE 420 FOR DEEP SCAN.\n";
            echo "\n$bold" . "420:$cln THIS 420 TYPE CRAWLER TAKES A LITTLE BIT TIME BUT IT DOES DEEP SCANNING!!\n\n";
csel:
            echo "Select Crawler Type (69/420): ";
            $ctype = trim(fgets(STDIN, 1024));
            if ($ctype == "420")
              {
                echo "\n\t -[ A D V A N C E   C R A W L I N G ]-\n";
                echo "\n\n";
                echo "\n Loading Crawler File ....\n";
                if (file_exists("crawl/admin.ini"))
                  {
                    echo "\n[-] Admin Crawler File Found! Scanning For Admin Pannel [-]\n";
                    $crawllnk = file_get_contents("crawl/admin.ini");
                    $crawls   = explode(',', $crawllnk);
                    echo "\nURLs Loaded: " . count($crawls) . "\n\n";
                    foreach ($crawls as $crawl)
                      {
                        $url    = $ipsl . $ip . "/" . $crawl;
                        $handle = curl_init($url);
                        curl_setopt($handle, CURLOPT_RETURNTRANSFER, TRUE);
                        $response = curl_exec($handle);
                        $httpCode = curl_getinfo($handle, CURLINFO_HTTP_CODE);
                        if ($httpCode == 200)
                          {
                            echo "\n\n[U] $url : ";
                            echo "Found!";
                          }
                        elseif ($httpCode == 404)
                          {
                          }
                        else
                          {
                            echo "\n\n[U] $url : ";
                            echo "HTTP Response: " . $httpCode;
                          }
                        curl_close($handle);
                      }
                  }
                else
                  {
                    echo "\n File Not Found, Aborting Crawl ....\n";
                  }
                if (file_exists("crawl/backup.ini"))
                  {
                    echo "\n[-] Backup Crawler File Found! Scanning For Site Backups [-]\n";
                    $crawllnk = file_get_contents("crawl/backup.ini");
                    $crawls   = explode(',', $crawllnk);
                    echo "\nURLs Loaded: " . count($crawls) . "\n\n";
                    foreach ($crawls as $crawl)
                      {
                        $url    = $ipsl . $ip . "/" . $crawl;
                        $handle = curl_init($url);
                        curl_setopt($handle, CURLOPT_RETURNTRANSFER, TRUE);
                        $response = curl_exec($handle);
                        $httpCode = curl_getinfo($handle, CURLINFO_HTTP_CODE);
                        if ($httpCode == 200)
                          {
                            echo "\n\n[U] $url : ";
                            echo "Found!";
                          }
                        elseif ($httpCode == 404)
                          {
                          }
                        else
                          {
                            echo "\n\n[U] $url : ";
                            echo "HTTP Response: " . $httpCode;
                          }
                        curl_close($handle);
                      }
                  }
                else
                  {
                    echo "\n File Not Found, Aborting Crawl ....\n";
                  }
                if (file_exists("crawl/others.ini"))
                  {
                    echo "\n[-] General Crawler File Found! Crawling The Site [-]\n";
                    $crawllnk = file_get_contents("crawl/others.ini");
                    $crawls   = explode(',', $crawllnk);
                    echo "\nURLs Loaded: " . count($crawls) . "\n\n";
                    foreach ($crawls as $crawl)
                      {
                        $url    = $ipsl . $ip . "/" . $crawl;
                        $handle = curl_init($url);
                        curl_setopt($handle, CURLOPT_RETURNTRANSFER, TRUE);
                        $response = curl_exec($handle);
                        $httpCode = curl_getinfo($handle, CURLINFO_HTTP_CODE);
                        if ($httpCode == 200)
                          {
                            echo "\n\n[U] $url : ";
                            echo "Found!";
                          }
                        elseif ($httpCode == 404)
                          {
                          }
                        else
                          {
                            echo "\n\n[U] $url : ";
                            echo "HTTP Response: " . $httpCode;
                          }
                        curl_close($handle);
                      }
                  }
                else
                  {
                    echo "\n File Not Found, Aborting Crawl ....\n";
                  }
              }
            elseif ($ctype == "69")
              {
                echo "\n\t -[ B A S I C   C R A W L I N G ]-\n";
                echo "\n\n";
                echo "\n Loading Crawler File ....\n";
                if (file_exists("crawl/admin.ini"))
                  {
                    echo "\n[-] Admin Crawler File Found! Scanning For Admin Pannel [-]\n";
                    $crawllnk = file_get_contents("crawl/admin.ini");
                    $crawls   = explode(',', $crawllnk);
                    echo "\nURLs Loaded: " . count($crawls) . "\n\n";
                    foreach ($crawls as $crawl)
                      {
                        $url    = $ipsl . $ip . "/" . $crawl;
                        $handle = curl_init($url);
                        curl_setopt($handle, CURLOPT_RETURNTRANSFER, TRUE);
                        $response = curl_exec($handle);
                        $httpCode = curl_getinfo($handle, CURLINFO_HTTP_CODE);
                        if ($httpCode == 200)
                          {
                            echo "\n\n[U] $url : ";
                            echo "Found!";
                          }
                        elseif ($httpCode == 404)
                          {
                          }
                        else
                          {
                            echo ".";
                          }
                        curl_close($handle);
                      }
                  }
                else
                  {
                    echo "\n File Not Found, Aborting Crawl ....\n";
                  }
                if (file_exists("crawl/backup.ini"))
                  {
                    echo "\n[-] Backup Crawler File Found! Scanning For Site Backups [-]\n";
                    $crawllnk = file_get_contents("crawl/backup.ini");
                    $crawls   = explode(',', $crawllnk);
                    echo "\nURLs Loaded: " . count($crawls) . "\n\n";
                    foreach ($crawls as $crawl)
                      {
                        $url    = $ipsl . $ip . "/" . $crawl;
                        $handle = curl_init($url);
                        curl_setopt($handle, CURLOPT_RETURNTRANSFER, TRUE);
                        $response = curl_exec($handle);
                        $httpCode = curl_getinfo($handle, CURLINFO_HTTP_CODE);
                        if ($httpCode == 200)
                          {
                            echo "\n\n[U] $url : ";
                            echo "Found!";
                          }
                        elseif ($httpCode == 404)
                          {
                          }
                        curl_close($handle);
                      }
                  }
                else
                  {
                    echo "\n File Not Found, Aborting Crawl ....\n";
                  }
                if (file_exists("crawl/others.ini"))
                  {
                    echo "\n[-] General Crawler File Found! Crawling The Site [-]\n";
                    $crawllnk = file_get_contents("crawl/others.ini");
                    $crawls   = explode(',', $crawllnk);
                    echo "\nURLs Loaded: " . count($crawls) . "\n\n";
                    foreach ($crawls as $crawl)
                      {
                        $url    = $ipsl . $ip . "/" . $crawl;
                        $handle = curl_init($url);
                        curl_setopt($handle, CURLOPT_RETURNTRANSFER, TRUE);
                        $response = curl_exec($handle);
                        $httpCode = curl_getinfo($handle, CURLINFO_HTTP_CODE);
                        if ($httpCode == 200)
                          {
                            echo "\n\n[U] $url : ";
                            echo "Found!";
                          }
                        elseif ($httpCode == 404)
                          {
                          }
                        curl_close($handle);
                      }
                  }
                else
                  {
                    echo "\n File Not Found, Aborting Crawl ....\n";
                  }
              }
            else
              {
                goto csel;
              }
          }
      }
  }
?>
