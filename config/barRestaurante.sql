CREATE DATABASE IF NOT EXISTS bar_restaurante;
USE bar_restaurante;

CREATE TABLE usuarios
(
    id_usuario INT AUTO_INCREMENT PRIMARY KEY,
    nombre     VARCHAR(50)  NOT NULL,
    apellidos  VARCHAR(100) NOT NULL,
    email      VARCHAR(100) NOT NULL UNIQUE,
    contraseña VARCHAR(255) NOT NULL,
    rol        ENUM('cliente','camarero','administrador') NOT NULL DEFAULT 'cliente',
    foto       VARCHAR(255)
);

CREATE TABLE categorias_platos
(
    id_categoria     INT AUTO_INCREMENT PRIMARY KEY,
    nombre_categoria VARCHAR(50) NOT NULL
);

CREATE TABLE platos
(
    id_plato        INT AUTO_INCREMENT PRIMARY KEY,
    nombre          VARCHAR(100)  NOT NULL,
    descripcion     TEXT,
    precio          DECIMAL(8, 2) NOT NULL,
    disponible      BOOLEAN       NOT NULL DEFAULT TRUE,
    en_oferta       BOOLEAN       NOT NULL DEFAULT FALSE,
    fecha_inclusion DATE                   DEFAULT CURRENT_DATE,
    foto            VARCHAR(255),
    id_categoria    INT           NOT NULL,
    FOREIGN KEY (id_categoria) REFERENCES categorias_platos (id_categoria)
        ON DELETE CASCADE
        ON UPDATE CASCADE
);

CREATE TABLE categorias_bebidas
(
    id_categoria_bebida INT AUTO_INCREMENT PRIMARY KEY,
    nombre_categoria    VARCHAR(50) NOT NULL
);

CREATE TABLE bebidas
(
    id_bebida           INT AUTO_INCREMENT PRIMARY KEY,
    nombre              VARCHAR(100)  NOT NULL,
    descripcion         TEXT,
    precio              DECIMAL(8, 2) NOT NULL,
    disponible          BOOLEAN       NOT NULL DEFAULT TRUE,
    en_oferta           BOOLEAN       NOT NULL DEFAULT FALSE,
    fecha_inclusion     DATE                   DEFAULT CURRENT_DATE,
    foto                VARCHAR(255),
    id_categoria_bebida INT           NOT NULL,
    FOREIGN KEY (id_categoria_bebida) REFERENCES categorias_bebidas (id_categoria_bebida)
        ON DELETE CASCADE
        ON UPDATE CASCADE
);

CREATE TABLE pedidos
(
    id_pedido     INT AUTO_INCREMENT PRIMARY KEY,
    id_usuario    INT            NOT NULL,
    tipo_servicio ENUM('en mesa','para llevar','domicilio') NOT NULL,
    mesa          VARCHAR(10),
    coste_total   DECIMAL(10, 2) NOT NULL,
    estado        ENUM('pendiente','servido','cancelado') NOT NULL DEFAULT 'pendiente',
    fecha_hora    DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_usuario) REFERENCES usuarios (id_usuario)
        ON DELETE CASCADE
        ON UPDATE CASCADE
);

CREATE TABLE lineas_pedidos
(
    id_linea  INT AUTO_INCREMENT PRIMARY KEY,
    id_pedido INT NOT NULL,
    id_plato  INT,
    id_bebida INT,
    cantidad  INT NOT NULL,
    FOREIGN KEY (id_pedido) REFERENCES pedidos (id_pedido)
        ON DELETE CASCADE
        ON UPDATE CASCADE,
    FOREIGN KEY (id_plato) REFERENCES platos (id_plato)
        ON DELETE CASCADE
        ON UPDATE CASCADE,
    FOREIGN KEY (id_bebida) REFERENCES bebidas (id_bebida)
        ON DELETE CASCADE
        ON UPDATE CASCADE
);

