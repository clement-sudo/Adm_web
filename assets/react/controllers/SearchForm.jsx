import React, { useState } from 'react';

function SearchForm() {
    const [searchTerm, setSearchTerm] = useState('');
    const [results, setResults] = useState([]);

    const handleInputChange = (event) => {
        setSearchTerm(event.target.value);
    };
    
    const handleSearch = async (event) => {
        event.preventDefault();
        try {
            const response = await fetch(`/api/search?nom=${encodeURIComponent(searchTerm)}`);
            if (!response.ok) {
                throw new Error(`Erreur: ${response.statusText}`);
            }
            const data = await response.json();
            console.log(data)
            setResults(data);
        } catch (error) {
            console.error("Erreur lors de la récupération des données", error);
        }
    };

    return (
        <>
            <form onSubmit={handleSearch}>
                <input
                    type="text"
                    value={searchTerm}
                    onChange={handleInputChange}
                    placeholder="Rechercher par nom"
                />
                <button type="submit">Rechercher</button>
            </form>

            <div>
                {results.length > 0 ? (
                    <ul>
                        {results.map((habitant, index) => (
                            <li key={index}>{habitant.nom}, {habitant.prenom}</li>
                        ))}
                    </ul>
                ) : (
                    <p>Aucun résultat trouvé</p>
                )}
            </div>
        </>
    );
}

export default SearchForm;
