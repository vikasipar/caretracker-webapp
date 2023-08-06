## caretracker-webapp | PHP and MySQL

### Home

<b>CareTracker</b> is a passive children tracking system. Here the child will wear the tracking band like a bracelet which will be provided with NFC tag and QR code.
<b>NFC </b> stands for Near Field Communication. It is a wireless communication technology that enables two devices to communicate with each other when they are in close proximity, typically within a few centimeters. NFC is based on radio frequency identification (RFID) technology, which allows two-way communication between devices.<br>

![home](https://github.com/vikasipar/caretracker-webapp/assets/98696526/52003825-8f20-45b3-92d0-3c3b037bd20c)

<br><br><br>

### Dashboard

Parents who want to register their children can visit CareTracker's website. At first, they have to sign up on the website with the correct information then they can create a QR code for their children with help of QR-Monkey API. Parents can update and upload their child's information whenever they want, and this updated and uploaded information will be stored in the children’s database.<br>

![dashboard](https://github.com/vikasipar/caretracker-webapp/assets/98696526/901bb06c-e4a8-49c2-818a-8489edae71a3)

<br>

#### Add Child 

![addchild](https://github.com/vikasipar/caretracker-webapp/assets/98696526/117a935d-975a-4924-b005-c206be6e2234)

<br><br><br>

### Child Profile ([Demo Profile Link](https://vikasipar.github.io/ct-userprofile/))

CareTracker helps us to find missing children. It uses NFC to enable communication between the system and the finder person's cell phone. If a person finds a missing child, the finder person will scan the NFC tag integrated with the safety band worn by the child. As a finder person scans an NFC tag he will get a link on his screen, after clicking it he will be redirected to the CareTracker's web UI and he will be asked to allow his device's location and now he can see the child's information. The finder person can directly contact the parent through the phone call if he wanted to. The real-time location of the finder person will be shared with the respective parent through the web server.
<br>

![profile](https://github.com/vikasipar/caretracker-webapp/assets/98696526/6c5f06f2-ee01-4b6c-b5e4-bbfa658661c3)

<br><br>
