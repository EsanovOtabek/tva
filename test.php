<?php 


require 'app/textgears.php';

$textgear=new TextGears();

$summ=$textgear->suggest("Reality is not a straight line. Every passing moment is a chance for a new offshoot, a new variation. In fact, there are more realities than you can possibly fandom an infinite number of what is Jeffrey, right? And as the voice of the watcher and marvels, what if I can see what few others can, the totality of the multi-verse across all time and space, the stories you thought you knew or nothing like you remember familiar faces in unfamiliar roles, the captain soldiers, agent Carter, no one expected who became friends. Wow. I did not see that coming.");
print_r($summ['response']);




$summary_2=implode("\n", (array)$summ['response']['summary']);
print_r($summary_2);