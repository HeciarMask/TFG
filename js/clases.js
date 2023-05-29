class Catalogo {
    _listaProfesores = Array();

    addProfe(profe) {
        this._listaProfesores.push(profe);
    }

    get listaProfesores() {
        return this._listaProfesores;
    }
    set listaProfesores(value) {
        this._listaProfesores = value;
    }
}

class Profesor {
    _idProf;
    _correoProf;
    _nombreProf;
    _nivelProf;
    _descProf;
    _claveProf;

    constructor(id, correo, nombre, nivel, desc, clave) {
        this._idProf = id;
        this._correoProf = correo;
        this._nombreProf = nombre;
        this._nivelProf = nivel;
        this._descProf = desc;
        this._claveProf = clave;
    }

    get idProf() {
        return this._idProf;
    }
    set idProf(value) {
        this._idProf = value;
    }
    get correoProf() {
        return this._correoProf;
    }
    set correoProf(value) {
        this._correoProf = value;
    }
    get nombreProf() {
        return this._nombreProf;
    }
    set nombreProf(value) {
        this._nombreProf = value;
    }
    get nivelProf() {
        return this._nivelProf;
    }
    set nivelProf(value) {
        this._nivelProf = value;
    }
    get descProf() {
        return this._descProf;
    }
    set descProf(value) {
        this._descProf = value;
    }

    get claveProf() {
        return this._claveProf;
    }
    set claveProf(value) {
        this._claveProf = value;
    }
}
