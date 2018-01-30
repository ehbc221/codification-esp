<?php

namespace App\Http\Controllers\Student;

use App\Grade;
use App\Http\Controllers\Controller;
use App\Http\Requests\StudentProfileRequest;
use App\Student;
use App\User;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Jenssegers\Date\Date;

class ProfileController extends Controller
{
    public function __construct()
    {
        View::share('controller_name', 'Mon Compte');
    }

    private
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (Auth::user()->id != $id) {
            return response('Vous n\'avez pas accès à cett ressource.', 501);
        }

        $student = Student::getStudentProfile($id);
        $grade = Grade::getGrade($student->grade_id);
        $student['grade'] = $grade->department_name . ' - ' . $grade->formation_name . ' ' . $grade->grade_number;

        $action_name = 'Voir';
        return view('student.profile.show', compact(['action_name', 'student']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Auth::user()->id != $id) {
            return response('Vous n\'avez pas accès à cett ressource.', 501);
        }

        $student = Student::getStudentProfile($id);
        $student['is_foreign'] = ($student['is_foreign']) ? 'oui' : 'non';
        $grades = Grade::getGradesOptionListToArray();
        $sexes = ['Masculin' => 'Masculin', 'Féminin' => 'Féminin'];
        $countriesList = new Collection($this->countriesList);
        $countries = $countriesList->mapWithKeys(function ($item) {
            return [$item => $item];
        });
        $countries = $countries->toArray();

        $action_name = 'Modifier';
        return view('student.profile.edit', compact(['action_name', 'student', 'grades', 'sexes', 'countries']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param StudentProfileRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(StudentProfileRequest $request, $id)
    {
        if (Auth::user()->id != $id) {
            return response('Vous n\'avez pas accès à cett ressource.', 501);
        }

        $user = User::findOrFail($request->input('user_id'));
        $student = Student::findOrFail($id);

        // Save User
        $input = [
            'name' => $request['name'],
            'email' => $request['email'],
            'phone' => $request['phone'],
            'cin' => $request['cin'],
            'matriculation' => $request['matriculation']
        ];
        if (isset($request['password']) && !empty($request['password'])) $input['password'] = bcrypt($request['password']);
        $user->update($input);

        // Save Student
        $is_foreign = ($request['is_foreign'] === 'oui') ? true : false;
        $native_country = ($is_foreign) ? $request['native_country'] : 'Sénégal';
        $input = [
            'date_of_birth' => new Date($request['date_of_birth']),
            'place_of_birth' => $request['place_of_birth'],
            'sex' => $request['sex'],
            'grade_id' => $request['grade_id'],
            'is_foreign' => $is_foreign,
            'native_country' => $native_country
        ];
        $student->update($input);

        return redirect()->route('student.profil.show', ['id' => $id])
            ->with('success', 'Compte modifié avec succès.');
    }
}
