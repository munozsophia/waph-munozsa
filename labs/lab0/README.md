# waph-munozsa

## Instructor: Dr. Phu Phung

## Student

**Name**: Sophia Munoz

**Email**: [mailto:munozsa@mail.uc.edu](munozsa@mail.uc.edu)

![Sophia's headshot](../../images/headshot.jpg)

# Lab 0 - Development Environment Setup 

## The Lab's Overview

For Lab0 there were two parts. Part I is setting up the Ubuntu 22.04 Virtual Machine through VirtualBox and installing all the applications necessary \(e.g. net-tools, apache web server, git, sublime, pandoc, pdflatex, and Google Chrome). Part II entailed cloning the course repository and creating a private repository. This included following the git instructions to successfully complete the Lab0 report.

Lab0 Folder: [https://github.com/munozsophia/waph-munozsa/blob/main/labs/lab0](https://github.com/munozsophia/waph-munozsa/blob/main/labs/lab0).


## Part I - Ubuntu Virtual Machine & Software Installation

> #### Ubuntu 22.04 Virtual Machine Setup
>
> Follow the instructions on [Ubuntu VM Tutorial](https://ubuntu.com/tutorials/how-to-run-ubuntu-desktop-on-a-virtual-machine-using-virtualbox#1-overview)
>
> - Install and configure VirtualBox
> - Import an Ubuntu image
> - Run a virtual instance of Ubuntu Desktop
> - Setup NAT and Host-only Adapters

> #### net-tools Intallation
>
> Now that the VM has an IP address accessible within the virtual network
> 
> At the command prompt, type `sudo apt install net-tools`,
> type `ifconfig` to view IP address
>
> #### Apache Web Server Intallation
>
> At the command prompt, type `$ sudo apt install apache2`
>
> #### git Installation
>
> At the command prompt, type `$ sudo apt install git`
>
> #### Sublime Test Editor Installation
>
> At the command prompt, type `$ sudo snap install sublime-text --classic`

> #### pandoc Installation
>
> At the command prompt, type `$ sudo apt install pandoc`
>
> #### pdflatex Installation
>
> Since `pandoc` requires `pdflatex` and its fronts to render files, type in the following:
>
> - `$ sudo apt-get install texlive-latex-base`
> - `$ sudo apt-get install texlive-fonts-recommended`
> - `$ sudo apt-get install texlive-latex-extra`
> - `$ sudo apt-get install texlive-fonts-extra`

> #### Google Chrome Installation
>
> - Download Google Chrome \(.deb package)
> 	- Open Firefox
> 	- Visit the [Google Chrome download](https://www.google.com/chrome/?platform=linux) page
> 	- Select **64-bit.deb** \(For Debian/Ubuntu)
> 	- Click **Install** button
> - Open the Downloaded File
> 	- Go to **Downloads**
> 	- Double-click `google-chrome-stable_current_amd64.deb`
> 	- It will open in **Ubuntu Software Center**
> - Install Google Chrome
> 	- Click Install
>	- Enter your system password when prompted

### Apache Web Server Testing

![Apache Web Server in Ubuntu VM](../../images/apache-ubuntu-vm.png)
*Apache Web Server in Ubuntu VM*

![Apache Web Server in Laptop](../../images/apache-laptop.png)
*Apache Web Server in Laptop*

## Part II - git Repositories and Exercises

### Course Repository

![Cloned Course Repository](../../images/course-repo.png)

*Cloned Course Repository*

### Private Repository

The steps I took to create my private repository on [GitHub.com](https://github.com):

> - Click the green `Create repository` button
> - Name the repository with the following naming convention `waph-your-uc-username` \(`waph-munozsa`)
> - Check off Private configuration
> - Select `Add a README file`
> - Choose license `Apache License 2.0`

To share the repository with Instructor `phung-waph`

> From the private repository, click on:
>
> - settings -> collaborators -> add people
> - type user `phung-waph` and add it

This repository's full URL is [https://github.com/munozsophia/waph-munozsa.git](https://github.com/munozsophia/waph-munozsa.git).

> #### Generating and Setting up SSH Keys
>
> - From the terminal: `$ ssh-keygen`
> - Press Enter: accepting default location
> - Enter/re-enter a passphrase when terminal asks \(can be blank too)
> - The key files are stored in `/.ssh` folder. To view the files: `$ ls ~/.ssh`
> - To view and copy the key: `$ cat ~/.ssh/id_rsa.pub`
> - Then select and copy
>
> To add the public key to a GitHub account:
>
> - Click account profile
> - Click settings -> SSH and GPG keys -> new ssh key
> - Title the key and paste the copied key to the Key section
> - click `Add SSH key`

> #### Clone Private Repo to VM using SSH Key
>
> In home directory \(~), `$ git clone <url>` \(git@github.com:munozsophia/waph-munozsa.git)
>
> Get URL from the repo overview, click Code -> SSH

![Committed changes to Private Repository](../../images/private-repo.png)

*Committed changes to Private Repository*