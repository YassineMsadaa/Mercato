<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Annonce;

class AnnnonceFixture extends Fixture
{
    public function load(ObjectManager $manager)
    {

        for($i=1;$i<=18;$i++){
            $annonce = new Annonce();
            $annonce->setTitle("Mon super annnonce".$i);
            $annonce->setContenu("La presse européenne a salué ce mercredi la « victoire des supporters » face à une Super Ligue devenue « super ridicule » après le départ des clubs anglais du projet.En Espagne, Marca souligne un « jour spécial » et a sorti une double une. Le quotidien sportif a mis en avant d'un côté, une Super Ligue devenue « super ridicule » avec la sortie des clubs anglais et met à l'honneur de l'autre côté le Championnat espagnol, « la Super Ligue de tout le monde ». La prochaine journée de Liga est effectivement une « journée passionnante pour le titre, la course à l'Europe et le maintien ». Marca se montre également critique envers Florentino Perez et son projet « détruit en 48 heures. »");
            $annonce->setFilename($i.".jpg");

            $manager->persist($annonce);
        }




        $manager->flush();
    }
}
