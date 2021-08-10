<!doctype html>

<?php
        $name = htmlentities($_POST{'HeroName'});
        $name = strtolower($name);
        $name = ucwords($name);
        $race = $_POST{'Race'};
        $class = $_POST{'Class'};
        $age = $_POST{'Age'};
        $gender = $_POST{'gender'};
        $kingdom = $_POST{'KingdomName'};
        //print_r($_POST);
        
        $characterport = "<img src='images/";
        $charactersheet = "<header><h4>$name from $kingdom</h4><br>"
                . "<b>$race $class</b><br> At the age of $age</header>";
        
        switch ($race)
        {
            case "Human":
                $characterport .= "Hu";
                $charactersheet = $charactersheet . "<p><b>Description: Humans "
                        . "come in a broad variety of shapes and sizes. An "
                        . "average Human male in good health stands around "
                        . "six feet tall and weighs about 175 pounds. Most "
                        . "Humans live around 75 years.</b>";
                break;
            case "Elf":
                $characterport .= "El";
                $charactersheet = $charactersheet . "<p><b>Description: Elves "
                        . "are a slender race, with both genders standing "
                        . "around five feet tall and weighing around 130 "
                        . "pounds. Most have dark hair, with little or no body"
                        . " or facial hair. Their skin is pale, and they have "
                        . "pointed ears and delicate features. Elves are lithe "
                        . "and graceful. They have keen eyesight and hearing."
                        . " Elves are typically inquisitive, passionate, "
                        . "self-assured, and sometimes haughty. "
                        . "Their typical lifespan is a dozen centuries or "
                        . "more.</b>";
                break;
            case "Halfling":
                $characterport .= "Ha";
                $charactersheet = $charactersheet . "<p><b>Description: "
                        . "Halflings are small, slightly stocky folk who stand "
                        . "around three feet tall and weigh about 60 pounds. "
                        . "They have curly brown hair on their heads and feet, "
                        . "but rarely have facial hair. They are usually fair "
                        . "skinned, often with ruddy cheeks. Halflings are "
                        . "remarkably rugged for their small size. They are "
                        . "dexterous and nimble, capable of moving quietly and "
                        . "remaining very still. They usually go barefoot. "
                        . "Halflings are typically outgoing, unassuming "
                        . "and good-natured. They live about a hundred "
                        . "years.</b>";
                break;
            case "Dwarf":
                $characterport .= "Dw";
                $charactersheet = $charactersheet . "<p><b>Description: Dwarves"
                        . " are a short, stocky race; both male and female "
                        . "Dwarves stand around four feet tall and typically "
                        . "weigh around 120 pounds. Their long hair and thick "
                        . "beards are dark brown, gray or black. They take "
                        . "great pride in their beards, sometimes braiding or "
                        . "forking them. They have a fair to ruddy complexion. "
                        . "Dwarves have stout frames and a strong, muscular "
                        . "build. They are rugged and resilient, with the "
                        . "capacity to endure great hardships. Dwarves are "
                        . "typically practical, stubborn and courageous. "
                        . "They can also be introspective, "
                        . "suspicious and possessive. They have a lifespan of three to four centuries.</b>";
                break;
            default:
                $characterport = $characterport . "";
                $charactersheet = $charactersheet . "You picked a race that doesn't exist";
        }
        
        switch ($class)
        {
         case "Cleric":
                $characterport  = $characterport . "Cl";
                $charactersheet = $charactersheet . "<p><b>Clerics are those 
                    who have devoted themselves to the service of a deity, 
                    pantheon or other belief 
                    system. Most Clerics spend their time in mundane forms 
                    of service such as preaching and ministering in a temple; 
                    but there are those who are called to go abroad from the 
                    temple and serve their deity in a more direct way, smiting 
                    undead monsters and aiding in the battle against evil and 
                    chaos. Player character Clerics are assumed to be among 
                    the latter group.
                    <br><br>
Clerics fight about as well as Thieves, but not as well as Fighters. They are 
hardier than Thieves, at least at lower levels, as they are accustomed to 
physical labor that the Thief would deftly avoid. Clerics can cast 
spells of divine nature starting at 2nd level, and they have the 
power to Turn the Undead, that is, to drive away undead monsters by means of 
faith alone (see the Encounter section for details).
<br><br>
The Prime Requisite for Clerics is Wisdom; a 
character must have a Wisdom score of 9 or higher 
to become a Cleric. They may wear any armor, but 
may only use blunt weapons (specifically including warhammer, mace, maul, club,
quarterstaff, and sling). </p>";
                break;
            case "Fighter":
                $characterport = $characterport . "Fi";
                $charactersheet = $charactersheet . "<p><b>Fighters include 
                    soldiers, guardsmen, barbarian warriors, and anyone else 
                    for whom fighting is a way of life. They train in combat, 
                    and they generally approach problems head on, weapon drawn.
                    <br><br>
Not surprisingly, Fighters are best at fighting of all the classes. They are 
also the hardiest, able to take more punishment than any other class. 
Although they are not skilled in the ways of magic, Fighters can nonetheless 
use many magic items, including but not limited to magical weapons and armor.
<br><br>
The Prime Requisite for Fighters is Strength; a character must have a Strength 
score of 9 or higher to become a Fighter. Members of this class may wear any 
armor and use any weapon. </p>";
                break;
            case "Magic-User":
                $characterport  = $characterport . "Ma";
                $charactersheet = $charactersheet . "<p><b>Magic-Users are 
                    those who seek and use knowledge of the arcane. They do 
                    magic not as the Cleric does, by faith in a greater power, 
                    but rather through insight and understanding.
                    <br><br>
Magic-Users are the worst of all the classes at fighting; hours spent studying 
massive tomes of magic do not lead a character to become strong or adept with 
weapons. They are the least hardy, equal to Thieves at lower levels but quickly 
falling behind.
                    <br><br>
The Prime Requisite for Magic-Users is Intelligence; a character must have an 
Intelligence score of 9 or higher to become a Magic-User. The only weapons 
they become proficient with are the dagger and the walking staff (or cudgel). 
Magic-Users may not wear armor of any sort nor use a shield as such things 
interfere with spellcasting. </p>";
                break;
            case "Thief":
                $characterport  = $characterport . "Th";
                $charactersheet = $charactersheet . "<p><b>Thieves are those who 
                    take what they want or need by 
                    stealth, disarming traps and picking locks to get to the 
                    gold they crave; or 
                    “borrowing” money from pockets, beltpouches, etc. 
                    right under the nose of the “mark” without the victim ever 
                    knowing.
                    <br><br>
Thieves fight better than Magic-Users but not as well as Fighters. Avoidance of 
honest work leads Thieves to be less hardy than the other classes, though they 
do pull ahead of the Magic-Users at higher levels.
                    <br><br>
The Prime Requisite for Thieves is Dexterity; a character must have a 
Dexterity score of 9 or higher to become a Thief. They may use any weapon, 
but may not wear metal armor as it interferes with stealthy activities, 
nor may they use shields of any sort. Leather armor is acceptable, 
however.</p>";
                break;
         default:
             $characterport = $characterport . "";
             $charactersheet = $charactersheet . "You picked a class that doesn't exist";
        }    
        
        if ($gender == "Male")
        {
            $characterport = $characterport . "Ma.jpg'>";
        } 
        else
        {
            $characterport = $characterport . "Fe.jpg'>";
        }
                ?>

<html>
    <head>
        <meta charset="utf-8">
        <title>Character Info</title>
        <link href="data:image/x-icon;base64,AAABAAEAEBAAAAAAAABoBQAAFgAAACgAAAAQAAAAIAAAAAEACAAAAAAAAAEAAAAAAAAAAAAAAAEAAAAAAAAAAAAA19fXAMCAgAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIBAQECAgICAgICAQEBAgICAQABAgICAgICAgEAAQICAgEAAQECAgECAgEBAAEBAgIBAAAAAQEAAQEAAQAAAAEBAQABAQABAAEBAAEAAQEAAQEAAQEAAQABAQABAAEBAAEBAAEBAAEAAQEAAQABAQABAQAAAAEBAAAAAQEAAAABAQIBAQECAQABAQICAQEBAgICAgICAgEAAQICAgICAgICAgICAgIBAQECAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA=" rel="icon" type="image/x-icon" />
        <link href="view.css" rel="stylesheet" type="text/css">
  
        <style>
            img {
                height: 250px;
                padding: 3pt;
                float: right;
            }
            
        </style>
    </head>
    
    <body>
        <div id="form_container">
            <h3 class="Content">The Brave Adventurer</h3>
            <div class="CharacterSheet">
                <?php
                //print_r($_POST);
                print($characterport);
                print($charactersheet);
                ?>            
            </div>
        </div>
    </body>
</html>