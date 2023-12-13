import './styles/app.css'
import React from 'react';
import ReactDOM from 'react-dom';
import SearchForm from './react/controllers/SearchForm.jsx';

const root = ReactDOM.createRoot(
    document.getElementById('SearchForm')
);

root.render(
  <React.StrictMode>
    <SearchForm />
  </React.StrictMode>
);
registerReactControllerComponents(require.context('./react/controllers', true, /\.(j|t)sx?$/));



