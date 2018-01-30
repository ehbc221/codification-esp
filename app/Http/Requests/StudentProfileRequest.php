<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class StudentProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @param Request $request
     * @return array
     */
    public function rules(Request $request)
    {
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
        $sexes = ['Masculin', 'Féminin'];
        switch($this->method()) {
            case 'GET':
            case 'DELETE':
                {
                    return [];
                }
            case 'POST':
                {
                    return [];
                }
            case 'PUT':
            case 'PATCH':
                {
                    return [

                        // Compte
                        'name' => 'required|min:6|max:255',
                        'email' => [
                            'required',
                            'email',
                            Rule::unique('users')->ignore($request->input('user_id'))
                        ],
                        'password' => 'nullable|min:8|confirmed',
                        'password_confirmation' => 'required_with_all:password|same:password',
                        'phone' => [
                            'required',
                            'min:9',
                            Rule::unique('users')->ignore($request->input('user_id'))
                        ],
                        'cin' => [
                            'required',
                            Rule::unique('users')->ignore($request->input('user_id'))
                        ],
                        'matriculation' => [
                            'required',
                            Rule::unique('users')->ignore($request->input('user_id'))
                        ],

                        // Profil Étudiant
                        'user_id' => [
                            'required',
                            'exists:users,id',
                            Rule::unique('students')->where(function ($query) use($request) {
                                return $query->where('user_id', $request->input('user_id'));
                            })->ignore($request->input('id')),
                        ],
                        'date_of_birth' => 'required|date',
                        'place_of_birth' => 'required',
                        'sex' => [
                            'required',
                            Rule::in($sexes)
                        ],
                        'is_foreign' => [
                            'required',
                            Rule::in(['oui', 'non'])
                        ],
                        'native_country' => [
                            Rule::in($countriesList)
                        ],
                    ];
                }
            default:
                break;
        }
        return [];
    }
}
