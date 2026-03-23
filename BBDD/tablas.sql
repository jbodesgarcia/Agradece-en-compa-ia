CREATE TABLE Alumno (
    nPuesto CHAR(2) NOT NULL,
    nombre VARCHAR(20) NOT NULL,
    correo VARCHAR(20)  NOT NULL UNIQUE,
    pw VARCHAR(20) NOT NULL,
    nick VARCHAR(20) NOT NULL,
    info VARCHAR(50) NOT NULL,
    imagen VARCHAR(100) NOT NULL,
    PRIMARY KEY (nPuesto)
   
);

-- Tabla Agradecimiento
CREATE TABLE Agradecimiento (
    idAgradecimiento TINYINT UNSIGNED NOT NULL AUTO_INCREMENT,
    texto TEXT NOT NULL,
    idEmisor CHAR(2) NOT NULL,
    idReceptor CHAR(2) NOT NULL,
    PRIMARY KEY (idAgradecimiento),
    FOREIGN KEY (idEmisor) REFERENCES Alumno(nPuesto),
    FOREIGN KEY (idReceptor) REFERENCES Alumno(nPuesto),
    CONSTRAINT chk_emisor_receptor CHECK (idEmisor != idReceptor),
    CONSTRAINT CSU UNIQUE (idEmisor, idReceptor)
);
