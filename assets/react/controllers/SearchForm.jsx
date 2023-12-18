import React, { useState } from 'react';
import axios from 'axios';

function SearchForm() {
    const [searchTerm, setSearchTerm] = useState('');
    const [searchType, setSearchType] = useState('nom'); // Nouvelle state pour le type de recherche
    const [results, setResults] = useState([]);
    const [errorMessage, setErrorMessage] = useState('');

    // Gestion des changements dans le champ de recherche
    const handleInputChange = (event) => {
        setSearchTerm(event.target.value);
    };

    // Gestion des changements dans le sélecteur du type de recherche
    const handleSearchTypeChange = (event) => {
        setSearchType(event.target.value);
    };

    // Gestion de la soumission du formulaire
    const handleSearch = (event) => {
        event.preventDefault();
        axios.get("http://localhost:8000/api/search", { 
            params: { 
                term: searchTerm, 
                type: searchType 
            } 
        })
        .then(response => {
            if (response.status === 200 && Array.isArray(response.data)) {
                setResults(response.data);
                setErrorMessage('');
            } else {
                throw new Error(`Erreur: Réponse non valide`);
            }
        })
        .catch(error => {
            console.error("Erreur lors de la récupération des données", error);
            setErrorMessage("Une erreur est survenue lors de la récupération des résultats.");
        });
    };

    const formatDate = (dateString) => {
        const options = { year: 'numeric', month: 'long', day: 'numeric' };
        return new Intl.DateTimeFormat('fr-FR', options).format(new Date(dateString));
    };

    return (
        <>
            <form onSubmit={handleSearch}>
                <select value={searchType} onChange={handleSearchTypeChange}>
                    <option value="nom">Nom</option>
                    <option value="prenom">Prénom</option>
                    <option value="genre">Genre</option>
                </select>
                <input
                    type="text"
                    value={searchTerm}
                    onChange={handleInputChange}
                    placeholder="Recherche"
                />
                <button type="submit">Rechercher</button>
            </form>

            <div>
                {results.length > 0 ? (
                    <table>
                        <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Prénom</th>
                                <th>Date de Naissance</th>
                                <th>Genre</th>
                            </tr>
                        </thead>
                        <tbody>
                            {results.map((habitant, index) => (
                                <tr key={index}>
                                    <td>{habitant.nom}</td>
                                    <td>{habitant.prenom}</td>
                                    <td>{formatDate(habitant.dateNaissance)}</td>
                                    <td>{habitant.genre}</td>
                                </tr>
                            ))}
                        </tbody>
                    </table>
                ) : (
                    <p>{errorMessage || "Aucun résultat correspondant à votre recherche"}</p>
                )}
            </div>
        </>
    );
}
export default SearchForm;
