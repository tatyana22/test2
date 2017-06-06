<?php

$skills = [];
$perk = [
    'prize' => 1,
];
$skillsIncreas = [];

$atribut = [
 "Strength" => 1,
 "Perception" => 5,
 "Endurance" => 5,
 "Charisma" => 5,
 "Intelligence" => 5,
 "Agility" => 1,
 "Luck" => 5
];

function baseSkills($skills, $atribut){
    
    $skills['Barter'] = (($atribut['Charisma'] * 2) + 2 + ($atribut['Luck'] / 2));
    $skills['BigGuns'] = ($atribut['Endurance'] * 2) + 2 + ($atribut['Luck'] / 2);
    $skills['Energy Weapons'] = ($atribut['Perception'] * 2) + 2 + ($atribut['Luck'] / 2);
    $skills['Explosives'] = ($atribut['Perception'] * 2) + 2 + ($atribut['Luck'] / 2);
    $skills['Lockpick'] = ($atribut['Perception'] * 2) + 2 + ($atribut['Luck'] / 2);
    $skills['Medicine'] = ($atribut['Intelligence'] * 2) + 2 + ($atribut['Luck'] / 2);
    $skills['MeleeWeapons'] = ($atribut['Strength'] * 2) + 2 + ($atribut['Luck'] / 2);
    $skills['Repair'] = ($atribut['Intelligence'] * 2) + 2 + ($atribut['Luck'] / 2);
    $skills['Science'] = ($atribut['Intelligence'] * 2) + 2 + ($atribut['Luck'] / 2);
    $skills['SmallGuns'] = ($atribut['Agility'] * 2) + 2 + ($atribut['Luck'] / 2);
    $skills['Sneak'] = ($atribut['Agility'] * 2) + 2 + ($atribut['Luck'] / 2);
    $skills['Speech'] = ($atribut['Charisma'] * 2) + 2 + ($atribut['Luck'] / 2);
    $skills['Unarmed'] = ($atribut['Endurance'] * 2) + 2 + ($atribut['Luck'] / 2);

    foreach($skills as $key => $val){
        $skills[$key] = ceil($val);
    }

    return $skills;
}

function randSkills($skills){
    
    global $skillsIncreas;
    $i = 1;
    $point = 15;
    
    while($i <= 3){
        $key = array_rand($skills);
        if(!array_key_exists($key, $skillsIncreas)){
            $skills[$key] += $point;
            $skillsIncreas[$key] = $skills[$key];
            $i++;
        }
    }
    return $skills;
}
//print_r($skillsIncreas);

function randSkillsAdd($skills, $perk = null){
    
    global $skillsIncreas;
    $point = 15;
    
    if($perk['prize']){
        
        $key = array_rand($skills);
        if(!array_key_exists($key, $skillsIncreas)){
            $skills[$key] += $point;
            $skillsIncreas[$key] = $skills[$key];
        }
        return $skills; 
    } else{
        return $skills;
    }
        
}

$baseSkills = baseSkills($skills, $atribut);
$randSkills = randSkills($baseSkills);
$randSkillsAdd = randSkillsAdd($randSkills, $perk);

//print_r($randSkillsAdd);
//print_r($skillsIncreas);
//print_r($perk);



 