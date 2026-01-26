DROP
DATABASE IF EXISTS bar_restaurante;
CREATE
DATABASE bar_restaurante;
USE
bar_restaurante;

-- USUARIOS
CREATE TABLE usuarios
(
    id       INT AUTO_INCREMENT PRIMARY KEY,
    usuario  VARCHAR(50)  NOT NULL UNIQUE,
    email    VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    rol      ENUM('cliente','administrador') NOT NULL DEFAULT 'cliente'
);

-- PLATOS
CREATE TABLE platos
(
    id              INT AUTO_INCREMENT PRIMARY KEY,
    nombre          VARCHAR(100)  NOT NULL,
    descripcion     TEXT,
    precio          DECIMAL(8, 2) NOT NULL,
    categoria       VARCHAR(50)   NOT NULL,
    disponible      BOOLEAN       NOT NULL DEFAULT TRUE,
    en_oferta       BOOLEAN       NOT NULL DEFAULT FALSE,
    fecha_inclusion DATE                   DEFAULT CURRENT_DATE,
    foto            VARCHAR(255)
);

-- BEBIDAS
CREATE TABLE bebidas
(
    id              INT AUTO_INCREMENT PRIMARY KEY,
    nombre          VARCHAR(100)  NOT NULL,
    descripcion     TEXT,
    precio          DECIMAL(8, 2) NOT NULL,
    categoria       VARCHAR(50)   NOT NULL,
    disponible      BOOLEAN       NOT NULL DEFAULT TRUE,
    en_oferta       BOOLEAN       NOT NULL DEFAULT FALSE,
    fecha_inclusion DATE                   DEFAULT CURRENT_DATE,
    foto            VARCHAR(255)
);

-- PEDIDOS
CREATE TABLE pedidos
(
    id            INT AUTO_INCREMENT PRIMARY KEY,
    id_usuario    INT NOT NULL,
    tipo_servicio ENUM('en mesa','para llevar','domicilio') NOT NULL,
    estado        ENUM('pendiente','servido') NOT NULL DEFAULT 'pendiente',
    fecha_hora    DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_usuario) REFERENCES usuarios (id)
        ON DELETE CASCADE
        ON UPDATE CASCADE
);

-- PEDIDO_DETALLE
CREATE TABLE pedido_detalle
(
    id            INT AUTO_INCREMENT PRIMARY KEY,
    id_pedido     INT           NOT NULL,
    id_plato      INT,
    id_bebida     INT,
    cantidad      INT           NOT NULL,
    precio_unidad DECIMAL(8, 2) NOT NULL,
    FOREIGN KEY (id_pedido) REFERENCES pedidos (id)
        ON DELETE CASCADE
        ON UPDATE CASCADE,
    FOREIGN KEY (id_plato) REFERENCES platos (id)
        ON DELETE CASCADE
        ON UPDATE CASCADE,
    FOREIGN KEY (id_bebida) REFERENCES bebidas (id)
        ON DELETE CASCADE
        ON UPDATE CASCADE
);
-- INSERT PLATOS
INSERT INTO platos (nombre, descripcion, precio, categoria, disponible, foto)
VALUES ('Croquetas', '5Uds. Croquetas caseras de jamón', 4.50, 'entrante', 1, 'croquetas.jpg'),
       ('Ensalada César', 'Con pollo y salsa césar', 6.50, 'entrante', 0, 'Ensalada-cesar.jpg'),
       ('Sopa del día', 'Sopa casera', 5.00, 'entrante', 1, 'sopa.jpg'),
       ('Hamburguesa', 'Hamburguesa completa', 9.50, 'plato principal', 1, 'hamburguesa.jpg'),
       ('Entrecot', 'Entrecot a la brasa', 16.00, 'plato principal', 1, 'entrecot.jpg'),
       ('Paella', 'Paella mixta', 14.00, 'plato principal', 1, 'paella.jpg'),
       ('Pizza Margarita', 'Clásica italiana', 10.00, 'plato principal', 1, 'pizza-margarita.jpg'),
       ('Tarta de queso', 'Con mermelada de fresa', 4.50, 'postre', 1, 'tarta-queso.jpg'),
       ('Flan', 'Flan de huevo casero', 3.50, 'postre', 1, 'flan.jpg'),
       ('Helado', 'Helado de fresa', 3.00, 'postre', 0, 'helado-fresa.jpg');


-- INSERT BEBIDAS
INSERT INTO bebidas (nombre, descripcion, precio, categoria, disponible, foto)
VALUES ('Agua', 'Botella de agua', 1.50, 'refresco', 1, 'agua.jpg'),
       ('Coca-Cola', 'Refresco de cola', 2.00, 'refresco', 1, 'coca-cola.jpeg'),
       ('Fanta Naranja', 'Refresco de naranja', 2.00, 'refresco', 1, 'fanta-naranja.jpeg'),
       ('Sprite', 'Refresco de limón', 2.00, 'refresco', 0, 'sprite.jpeg'),
       ('Cerveza Mahou', 'Cerveza rubia', 2.50, 'cerveza', 1, 'mahou.jpeg'),
       ('Cerveza Ambar', 'Cerveza sin alcohol', 2.30, 'cerveza', 1, 'ambar.jpeg'),
       ('Vino Tinto', 'Vino tinto Rioja', 3.00, 'vino', 1, 'vino-tinto.jpeg'),
       ('Vino Blanco', 'Vino blanco Rueda', 3.00, 'vino', 1, 'vino-blanco.jpeg'),
       ('Kalimotxo', '80% de vino 20% de CocaCola', 4.00, 'vino', 1, 'kalimotxo.jpeg');

