
Welcome to RITSoft
------------------


Please do the following steps

cd ~
git clone https://projectsmcarit@bitbucket.org/ritsoftteam/ritsoft.git
cd ritsoft
sudo docker build -t ritsoftv3 .
sudo docker create --restart unless-stopped -i -t --name ritsoft-container -v $(pwd):/opt/lampp/htdocs/ -p 81:80 ritsoftv3
sudo docker start -i -a ritsoft-container
#sudo docker exec ritsoft-container mysql -e "source /opt/lampp/htdocs/database.sql"
#sudo docker exec ritsoft-container mysql testdatabase -e "source /opt/lampp/htdocs/table.sql"
#Now mysql is automatically invoked at container creation and starting, so do not execute the above commands

Take your browser and open 127.0.0.1/source/test.php

List of Contributors
********************
0. Tomsy Paul
1. Abraham Jerin John
2. Amal Siby
3. Ameena Shajahan
4. Amritha Chandrabose
5. Anitta Mathew
6. Annie Thomas
7. Anjana Shaji
8. Archana S
9. Arunima
10. Aryamol Reji
11. Asish Sabu
12. Athira Martin
13. Chithra P A
14. Danya
15. Dhanya Jose
16. Irin Maria Varghese
17. Leo Thomas 
18. Manju Manoj
19. Nikhil Cherian
20. Sankar S
21. Shamiya MR
22. Shubangi Sreekumar
23. Syama P S


