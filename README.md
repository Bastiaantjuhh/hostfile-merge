# hostfile-merge
Small script I use for merging hostfiles from different sources. Made for PiHole or Adguard Home.

This script is made to use as a Cronjob. I host this script under a subdomain on a public webhosting so that not only I but also other AdGoard Home devices I serve can use the same list and I dont need to update all manualy but on one central place.

Works with PiHole and Adguard Home.

## Table of content
- [hostfile-merge](#hostfile-merge)
  - [Table of content](#table-of-content)
  - [Requirements](#requirements)
  - [Install & Usage](#install--usage)
  - [Credits](#credits)
  - [Repository summary](#repository-summary)
  - [License](#license)

## Requirements
- PHP (I tested with PHP 7.4)
- Apache (or NGINX) webserver

## Install & Usage
1. Clone or download the repo to a publicly accessible place like a Apache or NGINX webserver with PHP installed.
2. Edit ```Cron.php``` and ad you're lists to the array.
    Example:
    ```php
    $blacklists = [
        __DIR__ . "/custom_blacklist.txt",
        "https://adguardteam.github.io/AdGuardSDNSFilter/Filters/filter.txt",
        "https://adaway.org/hosts.txt",
    ];

    $whitelist = [
        __DIR__ . "/custom_whitelist.txt"
    ];
    ```
3. Custom domains can be added to the ```custom_blacklist.txt``` and ```custom_whitelist.txt``` located in the Custom directory.
4. Make a cron job so that the script refresh the lists for example every day or every hour. 
5. Enter the URL of the whitelist and blacklist in either PiHole or Adguard Home.
6. In the ```.github/workflows``` directory there is a GitHub Actions file called ```main.yml``` this file makes it posible to automatic build the files for us every day.

## Credits

- Credits to the members of the PiHole community for providing a whitelist with domains. [Link](https://discourse.pi-hole.net/t/commonly-whitelisted-domains/212)
- [anudeepND](https://github.com/anudeepND)/[whitelist](https://github.com/anudeepND/whitelist)
- [AdguardTeam](https://github.com/AdguardTeam)/[AdGuardSDNSFilter](https://github.com/AdguardTeam/AdGuardSDNSFilter)
- [adaway.org](https://adaway.org)
- [StevenBlack](https://github.com/StevenBlack)/[hosts](https://github.com/StevenBlack/hosts)

## Repository summary

Description | Status
---- | ------
License | ![GitHub](https://img.shields.io/github/license/Bastiaantjuhh/hostfile-merge)
Commits | ![GitHub commit activity](https://img.shields.io/github/commit-activity/m/Bastiaantjuhh/hostfile-merge)
Language | ![GitHub top language](https://img.shields.io/github/languages/top/Bastiaantjuhh/hostfile-merge)
Open issues | ![GitHub issues](https://img.shields.io/github/issues/Bastiaantjuhh/hostfile-merge)
Closed issues | ![GitHub closed issues](https://img.shields.io/github/issues-closed/Bastiaantjuhh/hostfile-merge)
Pull requests | ![GitHub pull requests](https://img.shields.io/github/issues-pr-raw/Bastiaantjuhh/hostfile-merge)
Closed pull requests | ![GitHub closed pull requests](https://img.shields.io/github/issues-pr-closed-raw/Bastiaantjuhh/hostfile-merge)

## License
This project is licensed under the [MIT License](https://github.com/Bastiaantjuhh/hostfile-merge/blob/master/LICENSE). You are encouraged to embed the project into your other projects, as long as the license permits.

> MIT License
> 
> Copyright (c) 2022 Bastiaan de Hart
> 
> Permission is hereby granted, free of charge, to any person obtaining
> a copy of this software and associated documentation files (the
> "Software"), to deal in the Software without restriction, including
> without limitation the rights to use, copy, modify, merge, publish,
> distribute, sublicense, and/or sell copies of the Software, and to
> permit persons to whom the Software is furnished to do so, subject to
> the following conditions:
> 
> The above copyright notice and this permission notice shall be
> included in all copies or substantial portions of the Software.
> 
> THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND,
> EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF
> MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT.
> IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY
> CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT,
> TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE
> SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
