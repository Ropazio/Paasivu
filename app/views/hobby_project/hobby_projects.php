<?php

/* Projects is an array containing arrays with information on each project:
array (ordinal number: int, project description: str, [ image source: str, wide image: bool, image name ] )
*/

$character_projects = array (
    array(1, 'Geralt of Rivia, The Witcher 1 -pelin mukaan', [[add_img_path('Geralt1.jpg'), false, 'Geralt of Rivia (#1)'], [add_img_path('Geralt3.jpg'), false, 'Geralt of Rivia (#1)']]),
    array(2, 'Geralt of Rivia, The Witcher -sarjan mukaan (En tosin pidä henkilökohtaisesti sarjasta.)', [[add_img_path('Geralt2.jpg'), false, 'Geralt of Rivia (#2)'], [add_img_path('Geralts.jpg'), false, 'Geralts']]),
    array(3, 'Morrigan, Dragon Age Origins -pelin mukaan', [[add_img_path('Morrigan.jpg'), false, 'Morrigan']]),
    array(4, 'Ruttotohtori', [[add_img_path('Doctor1.jpg'), false, 'Ruttotohtori'], [add_img_path('Doctor2.jpg'), false, 'Ruttotohtori']]),
    array(5, 'Caveira, Rainbow six siege -pelistä', [[add_img_path('Caveira.jpg'), false, 'Caveira']]),
    array(6, 'Totoro, Studio Ghiblin Naapurini Totoro -elokuvasta', [[add_img_path('Totoro.jpg'), false, 'Totoro']]),
    array(7, 'Hawke, Dragon Age 2 -pelin mukaan (Hahmon vaatteet eivät ole minun tekemiäni tällä kertaa.)', [[add_img_path('Hawke.jpg'), false, 'Hawke']]),
    array(8, 'Baby Yoda, The Mandalorian -sarjasta', [[add_img_path('Yoda1.jpg'), false, 'Baby Yoda'], [add_img_path('Yoda2.jpg'), false, 'Baby Yoda ilman viittaa']]),
    array(9, 'Silmät hammasmallin pariksi goottisarjojen innoittamana!', [[add_img_path('Eyes.jpg'), false, 'Silmämunat']]),
    array(10, 'Haku-lohikäärme, Studio Ghiblin Henkien kätkemä -elokuvasta', [[add_img_path('Haku.jpg'), true, 'Haku']])
);

$textile_projects = array (
    array(1, 'Alma', [[add_img_path('Alma.jpeg'), false, 'Alma']]),
    array(2, 'Vauvan joulutossut', [[add_img_path('Shoes.jpeg'), false, 'Vauvan joulutossut']]),
    array(3, 'Huovutettu kettu', [[add_img_path('Fox.jpg'), false, 'Huovutettu kettu']]),
    array(4, 'Kerttu', [[add_img_path('Kerttu.jpg'), false, 'Kerttu']]),
    array(5, 'Kisu-avaimenperä', [[add_img_path('Kitty1.jpg'), false, 'Kisu'], [add_img_path('Kitty2.jpg'), false, 'Kisu repussa kiinni']]),
    array(6, 'Makramee', [[add_img_path('Makrame.jpg'), false, 'Makramee']]),
    array(7, 'Haalari', [[add_img_path('Dungarees.jpg'), false, 'Haalari']]),
    array(8, 'T-paita ja yöhousut', [[add_img_path('Clothes.jpg'), true, 'T-paita ja yöhousut']]),
    array(9, 'Paita', [[add_img_path('Shirt.jpg'), true, 'Paita']])
);

$technical_projects = array (
    array(1, 'Puukko (Teränä vanhan Moran terä.)', [[add_img_path('Puukko1.jpg'), false, 'Puukko'], [add_img_path('Puukko2.jpg'), false, 'Puukko']]),
    array(2, 'Jouluporo', [[add_img_path('Reindeer.jpg'), false, 'Jouluporo']]),
    array(3, 'Geraltin miekat (2 x teräsmiekka, 1 x hopeamiekka)', [[add_img_path('Swords.jpg'), false, 'Geraltin miekat'], [add_img_path('Silver_sword.jpg'), false, 'Geraltin hopeamiekka']]),
    array(4, 'Kasvitaso', [[add_img_path('Plant_stand.jpg'), false, 'Kasvitaso']]),
    array(5, 'Työtaso', [[add_img_path('Workbench.jpg'), false, 'Työtaso']])
);

$other_projects = array (
    array(1, 'Enderman, Minecraft-pelistä', [[add_img_path('Enderman.jpg'), false, 'Enderman']]),
    array(2, 'Pörriäinen, Minecraft-pelistä', [[add_img_path('Minecraft.jpg'), false, 'Pörriäinen']]),
    array(3, 'Lasinpuhallusta: pingviini, lintu, koristepallo, maljakko x 2', [[add_img_path('Glassware.jpg'), false, 'Lasinpuhallustöitä']]),
    array(4, 'Nuka-Cola Quantum, Fallout-pelissarjasta (Etiketti netistä.)', [[add_img_path('Bottle.jpg'), false, 'Nuka-Cola Quantum']]),
    array(5, 'Normandy SR-2, Mass Effect 2 -pelistä (Nimi puuttuu aluksen kyljestä. Löysin aluksen ja sukkuloiden 3D-mallit täältä: https://www.thingiverse.com/thing:4921765. Tuki omasta päästä.)', [[add_img_path('Normandy1.jpg'), true, 'Normandy SR-2'], [add_img_path('Normandy2.jpg'), true, 'Normandy SR-2'] ])
);
