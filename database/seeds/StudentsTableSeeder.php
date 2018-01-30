<?php

use Faker\Generator as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @param Faker $faker
     * @return void
     */
    public function run(Faker $faker)
    {
        $grades = \App\Grade::all()->shuffle();
        $users_students = \App\User::join('role_user', 'users.id', 'role_user.user_id')
            ->join('roles', 'role_user.role_id', 'roles.id')
            ->select('users.id')
            ->where('roles.name', 'student')
            ->get();
        $students = [];
        $countriesList = [
            "Afghanistan",
            "Afrique du Sud",
            "Albanie",
            "Algérie",
            "Allemagne",
            "Andorre",
            "Angola",
            "Anguilla",
            "Antarctique",
            "Antigua-et-Barbuda",
            "Antilles néerlandaises",
            "Arabie saoudite",
            "Argentine",
            "Arménie",
            "Aruba",
            "Australie",
            "Autriche",
            "Azerbaïdjan",
            "Bahamas",
            "Bahreïn",
            "Bangladesh",
            "Barbade",
            "Belgique",
            "Belize",
            "Bermudes",
            "Bhoutan",
            "Bolivie",
            "Bosnie-Herzégovine",
            "Botswana",
            "Brunéi Darussalam",
            "Brésil",
            "Bulgarie",
            "Burkina Faso",
            "Burundi",
            "Bélarus",
            "Bénin",
            "Cambodge",
            "Cameroun",
            "Canada",
            "Cap-Vert",
            "Chili",
            "Chine",
            "Chypre",
            "Colombie",
            "Comores",
            "Congo",
            "Corée du Nord",
            "Corée du Sud",
            "Costa Rica",
            "Croatie",
            "Cuba",
            "Côte d’Ivoire",
            "Danemark",
            "Djibouti",
            "Dominique",
            "El Salvador",
            "Égypte",
            "Émirats arabes unis",
            "Équateur",
            "Érythrée",
            "Espagne",
            "Estonie",
            "État de la Cité du Vatican",
            "États fédérés de Micronésie",
            "États-Unis",
            "Éthiopie",
            "Fidji",
            "Finlande",
            "France",
            "Gabon",
            "Gambie",
            "Ghana",
            "Gibraltar",
            "Grenade",
            "Groenland",
            "Grèce",
            "Guadeloupe",
            "Guam",
            "Guatemala",
            "Guernesey",
            "Guinée",
            "Guinée équatoriale",
            "Guinée-Bissau",
            "Guyana",
            "Guyane française",
            "Géorgie",
            "Géorgie du Sud et les îles Sandwich du Sud",
            "Haïti",
            "Honduras",
            "Hongrie",
            "Île Bouvet",
            "Île Christmas",
            "Île Norfolk",
            "Île de Man",
            "Îles Caïmans",
            "Îles Cocos - Keeling",
            "Îles Cook",
            "Îles Féroé",
            "Îles Heard et MacDonald",
            "Îles Malouines",
            "Îles Mariannes du Nord",
            "Îles Marshall",
            "Îles Mineures Éloignées des États-Unis",
            "Îles Salomon",
            "Îles Turks et Caïques",
            "Îles Vierges britanniques",
            "Îles Vierges des États-Unis",
            "Îles Åland",
            "Inde",
            "Indonésie",
            "Irak",
            "Iran",
            "Irlande",
            "Islande",
            "Israël",
            "Italie",
            "Jamaïque",
            "Japon",
            "Jersey",
            "Jordanie",
            "Kazakhstan",
            "Kenya",
            "Kirghizistan",
            "Kiribati",
            "Koweït",
            "Laos",
            "Lesotho",
            "Lettonie",
            "Liban",
            "Libye",
            "Libéria",
            "Liechtenstein",
            "Lituanie",
            "Luxembourg",
            "Macédoine",
            "Madagascar",
            "Malaisie",
            "Malawi",
            "Maldives",
            "Mali",
            "Malte",
            "Maroc",
            "Martinique",
            "Maurice",
            "Mauritanie",
            "Mayotte",
            "Mexique",
            "Moldavie",
            "Monaco",
            "Mongolie",
            "Montserrat",
            "Monténégro",
            "Mozambique",
            "Myanmar",
            "Namibie",
            "Nauru",
            "Nicaragua",
            "Niger",
            "Nigéria",
            "Niue",
            "Norvège",
            "Nouvelle-Calédonie",
            "Nouvelle-Zélande",
            "Népal",
            "Oman",
            "Ouganda",
            "Ouzbékistan",
            "Pakistan",
            "Palaos",
            "Panama",
            "Papouasie-Nouvelle-Guinée",
            "Paraguay",
            "Pays-Bas",
            "Philippines",
            "Pitcairn",
            "Pologne",
            "Polynésie française",
            "Porto Rico",
            "Portugal",
            "Pérou",
            "Qatar",
            "R.A.S. chinoise de Hong Kong",
            "R.A.S. chinoise de Macao",
            "Roumanie",
            "Royaume-Uni",
            "Russie",
            "Rwanda",
            "République centrafricaine",
            "République dominicaine",
            "République démocratique du Congo",
            "République tchèque",
            "Réunion",
            "Sahara occidental",
            "Saint-Barthélémy",
            "Saint-Kitts-et-Nevis",
            "Saint-Marin",
            "Saint-Martin",
            "Saint-Pierre-et-Miquelon",
            "Saint-Vincent-et-les Grenadines",
            "Sainte-Hélène",
            "Sainte-Lucie",
            "Samoa",
            "Samoa américaines",
            "Sao Tomé-et-Principe",
            "Serbie",
            "Serbie-et-Monténégro",
            "Seychelles",
            "Sierra Leone",
            "Singapour",
            "Slovaquie",
            "Slovénie",
            "Somalie",
            "Soudan",
            "Sri Lanka",
            "Suisse",
            "Suriname",
            "Suède",
            "Svalbard et Île Jan Mayen",
            "Swaziland",
            "Syrie",
            "Sénégal",
            "Tadjikistan",
            "Tanzanie",
            "Taïwan",
            "Tchad",
            "Terres australes françaises",
            "Territoire britannique de l'océan Indien",
            "Territoire palestinien",
            "Thaïlande",
            "Timor oriental",
            "Togo",
            "Tokelau",
            "Tonga",
            "Trinité-et-Tobago",
            "Tunisie",
            "Turkménistan",
            "Turquie",
            "Tuvalu",
            "Ukraine",
            "Uruguay",
            "Vanuatu",
            "Venezuela",
            "Viêt Nam",
            "Wallis-et-Futuna",
            "Yémen",
            "Zambie",
            "Zimbabwe",
        ];
        foreach ($users_students as $users_student) {
            $is_foreign = $faker->randomElement([false, false, false, true, false,false]);
            $native_country = ($is_foreign) ? array_random($countriesList) : 'Sénégal';
            $student = [
                'user_id' => $users_student->id,
                'date_of_birth' => \Carbon\Carbon::createFromDate(rand(1990, 1998), rand(1, 12), rand(1, 27)),
                'place_of_birth' => $faker->text(30),
                'sex' => $faker->randomElement(['Masculin', 'Masculin', 'Féminin', 'Masculin', 'Féminin']),
                'grade_id' => $grades->first()->id,
                'is_foreign' => $is_foreign,
                'native_country' => $native_country,
                'created_at' => now(),
                'updated_at' => now()
            ];
            array_push($students, $student);
            $grades->shift();
        }
        DB::table('students')->insert($students);
    }
}
