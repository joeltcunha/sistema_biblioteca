-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `SistemaBiblioteca` DEFAULT CHARACTER SET utf8 ;
USE `SistemaBiblioteca` ;

-- -----------------------------------------------------
-- Table `mydb`.`Editora`
-- -----------------------------------------------------
CREATE TABLE `Editora` (
  `idEditora` INT NOT NULL AUTO_INCREMENT,
  `nome_editora` VARCHAR(45) NOT NULL UNIQUE,
  PRIMARY KEY (`idEditora`)
  );


-- -----------------------------------------------------
-- Table `mydb`.`UF`
-- -----------------------------------------------------
CREATE TABLE `UF` (
  `idUF` INT NOT NULL AUTO_INCREMENT,
  `uf` CHAR(2) NOT NULL UNIQUE,
  PRIMARY KEY (`idUF`)
  );


-- -----------------------------------------------------
-- Table `mydb`.`Livros`
-- -----------------------------------------------------
CREATE TABLE `Livros` (
  `idLivro` INT NOT NULL AUTO_INCREMENT,
  `numero` VARCHAR(10) NOT NULL,
  `titulo` VARCHAR(255) NOT NULL,
  `edicao` INT NOT NULL,
  `ano` INT NOT NULL,
  `numero_paginas` INT NOT NULL,
  `quantidade` INT NOT NULL,
  `descricao` TEXT NOT NULL,
  `capa_url` VARCHAR(500) NOT NULL,
  `status` TINYINT NOT NULL,
  `createdAt` TIMESTAMP NULL,
  `updatedAt` TIMESTAMP NULL,
  `idEditora` INT,
  `idUF` INT,
  FOREIGN KEY (`idEditora`) REFERENCES `Editora` (`idEditora`),
  FOREIGN KEY (`idUF`) REFERENCES `UF` (`idUF`),
  PRIMARY KEY (`idLivro`)
  );

-- -----------------------------------------------------
-- Table `mydb`.`Categoria`
-- -----------------------------------------------------
CREATE TABLE `Categoria` (
  `idCategoria` INT NOT NULL AUTO_INCREMENT,
  `nome_categoria` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idCategoria`)
  );

-- -----------------------------------------------------
-- Table `mydb`.`Material`
-- -----------------------------------------------------
CREATE TABLE `Material` (
  `idMaterial` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `createdAt` TIMESTAMP NULL,
  `updatedAt` TIMESTAMP NULL,
  `idCategoria` INT NOT NULL,
  PRIMARY KEY (`idMaterial`),
  FOREIGN KEY (`idCategoria`) REFERENCES `Categoria` (`idCategoria`)
  );


-- -----------------------------------------------------
-- Table `mydb`.`Turmas`
-- -----------------------------------------------------
CREATE TABLE `Turmas` (
  `idTurmas` INT NOT NULL AUTO_INCREMENT,
  `turma` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idTurmas`)
  );

-- -----------------------------------------------------
-- Table `mydb`.`CadastroAlunos`
-- -----------------------------------------------------
CREATE TABLE `CadastroAlunos` (
  `idUsuario` INT NOT NULL AUTO_INCREMENT,
  `ra` INT NOT NULL,
  `nome` VARCHAR(255) NOT NULL,
  `email` VARCHAR(45) NOT NULL UNIQUE,
  `telefone` VARCHAR(15) NOT NULL,
  `senha_hash` VARCHAR(255) NOT NULL,
  `aceitou_termo` TINYINT NOT NULL,
  `aceitou_notificacoes` TINYINT NOT NULL,
  `aceitou_novidades` TINYINT NOT NULL,
  `createdAt` TIMESTAMP NULL,
  `updatedAt` TIMESTAMP NULL,
  `idTurmas` INT NOT NULL,
  PRIMARY KEY (`idUsuario`),
  FOREIGN KEY (`idTurmas`) REFERENCES `Turmas` (`idTurmas`)
  );

-- -----------------------------------------------------
-- Table `mydb`.`CadastroBibliotecarias`
-- -----------------------------------------------------
CREATE TABLE `CadastroBibliotecarias` (
  `idCadastroBibliotecarias` INT NOT NULL AUTO_INCREMENT,
  `nome_bibliotecaria` VARCHAR(255) NULL,
  `email` VARCHAR(45) NOT NULL UNIQUE,
  `senha_hash` VARCHAR(255) NOT NULL,
  `createdAt` TIMESTAMP NULL,
  `updatedAt` TIMESTAMP NULL,
  PRIMARY KEY (`idCadastroBibliotecarias`)
  );

-- -----------------------------------------------------
-- Table `mydb`.`tipoUsuarios`
-- -----------------------------------------------------
CREATE TABLE `tipoUsuarios` (
  `idtipoUsuarios` INT NOT NULL AUTO_INCREMENT,
  `tipo_usuario` ENUM('Professor', 'Secretário', 'Coordenador', 'Vice-Diretor', 'Diretor', 'Supervisor', 'Financeiro', 'ASBs', 'RH', 'Secretaria') NOT NULL,
  PRIMARY KEY (`idtipoUsuarios`)
  );

-- -----------------------------------------------------
-- Table `mydb`.`CadastroFuncionarios`
-- -----------------------------------------------------
CREATE TABLE `CadastroFuncionarios` (
  `idCadastroFuncionarios` INT NOT NULL AUTO_INCREMENT,
  `ra` INT NOT NULL,
  `nome` VARCHAR(255) NOT NULL,
  `email` VARCHAR(45) NOT NULL UNIQUE,
  `telefone` VARCHAR(15) NOT NULL,
  `senha_hash` VARCHAR(255) NOT NULL,
  `aceitou_termo` TINYINT NOT NULL,
  `aceitou_notificacoes` TINYINT NOT NULL,
  `aceitou_novidades` TINYINT NOT NULL,
  `createdAt` TIMESTAMP NULL,
  `updatedAt` TIMESTAMP NULL,
  `idtipoUsuarios` INT NOT NULL,
  PRIMARY KEY (`idCadastroFuncionarios`),
  FOREIGN KEY (`idtipoUsuarios`) REFERENCES `tipoUsuarios` (`idtipoUsuarios`)
  );


-- -----------------------------------------------------
-- Table `mydb`.`emprestimoLivro`
-- -----------------------------------------------------
CREATE TABLE `emprestimoLivro` (
  `idEmprestimoLivro` INT NOT NULL AUTO_INCREMENT,
  `data_emprestimo` DATE NOT NULL,
  `data_devolucao_prevista` DATE NOT NULL,
  `data_devolucao_real` DATE NULL,
  `status_emprestimo` ENUM('Ativo', 'Devolvido', 'Atrasado') NOT NULL,
  `createdAt` TIMESTAMP NULL,
  `updatedAt` TIMESTAMP NULL,
  `idCadastroBibliotecarias` INT NOT NULL,
  `idUsuario` INT,
  `idLivro` INT NOT NULL,
  `idCadastroFuncionarios` INT,
  PRIMARY KEY (`idEmprestimoLivro`),
  FOREIGN KEY (`idCadastroBibliotecarias`) REFERENCES `CadastroBibliotecarias` (`idCadastroBibliotecarias`),
  FOREIGN KEY (`idUsuario`) REFERENCES `CadastroAlunos` (`idUsuario`),
  FOREIGN KEY (`idLivro`) REFERENCES `Livros` (`idLivro`),
  FOREIGN KEY (`idCadastroFuncionarios`) REFERENCES `CadastroFuncionarios` (`idCadastroFuncionarios`)
  );


-- -----------------------------------------------------
-- Table `mydb`.`emprestimoMaterial`
-- -----------------------------------------------------
CREATE TABLE `emprestimoMaterial` (
  `idEmprestimoMaterial` INT NOT NULL AUTO_INCREMENT,
  `turma` VARCHAR(45) NULL,
  `horario_emprestimo` TIME NOT NULL,
  `horario_devolucao` TIME NOT NULL,
  `createdAt` TIMESTAMP NULL,
  `updatedAt` TIMESTAMP NULL,
  `idUsuario` INT NULL,
  `idCadastroBibliotecarias` INT NOT NULL,
  `idCadastroFuncionarios` INT NOT NULL,
  PRIMARY KEY (`idEmprestimoMaterial`),
  FOREIGN KEY (`idUsuario`) REFERENCES `CadastroAlunos` (`idUsuario` ),
  FOREIGN KEY (`idCadastroBibliotecarias`) REFERENCES `CadastroBibliotecarias` (`idCadastroBibliotecarias`),
  FOREIGN KEY (`idCadastroFuncionarios`) REFERENCES `CadastroFuncionarios` (`idCadastroFuncionarios`)
  );


-- -----------------------------------------------------
-- Table `mydb`.`itensAcompanham`
-- -----------------------------------------------------
CREATE TABLE `itensAcompanham` (
  `idItensAcompanham` INT NOT NULL AUTO_INCREMENT,
  `idMaterial` INT NOT NULL,
  `Item` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idItensAcompanham`, `idMaterial`),
  FOREIGN KEY (`idMaterial`) REFERENCES `Material` (`idMaterial`)
  );


-- -----------------------------------------------------
-- Table `mydb`.`Tradutor`
-- -----------------------------------------------------
CREATE TABLE `Tradutor` (
  `idTradutor` INT NOT NULL AUTO_INCREMENT,
  `nome_tradutor` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`idTradutor`)
  );


-- -----------------------------------------------------
-- Table `mydb`.`Autor`
-- -----------------------------------------------------
CREATE TABLE `Autor` (
  `idAutor` INT NOT NULL AUTO_INCREMENT,
  `nome_autor` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`idAutor`)
  );


-- -----------------------------------------------------
-- Table `mydb`.`Genero`
-- -----------------------------------------------------
CREATE TABLE `Genero` (
  `idGenero` INT NOT NULL AUTO_INCREMENT,
  `nome_genero` VARCHAR(45) NOT NULL UNIQUE,
  PRIMARY KEY (`idGenero`)
  );


-- -----------------------------------------------------
-- Table `mydb`.`Material_has_EmprestimoMaterial`
-- -----------------------------------------------------
CREATE TABLE `Material_has_EmprestimoMaterial` (
  `idMaterialTemEmprestimoMaterial` INT NOT NULL AUTO_INCREMENT,
  `idMaterial` INT NOT NULL,
  `idEmprestimoMaterial` INT NOT NULL,
  PRIMARY KEY (`idMaterialTemEmprestimoMaterial`, `idMaterial`, `idEmprestimoMaterial`),
  FOREIGN KEY (`idMaterial`) REFERENCES `Material` (`idMaterial`),
  FOREIGN KEY (`idEmprestimoMaterial`) REFERENCES `emprestimoMaterial` (`idEmprestimoMaterial`)
  );


-- -----------------------------------------------------
-- Table `mydb`.`Autor_has_Livros`
-- -----------------------------------------------------
CREATE TABLE `Autor_has_Livros` (
  `idLivroTemAutor` INT NOT NULL AUTO_INCREMENT,
  `idAutor` INT NOT NULL,
  `idLivro` INT NOT NULL,
  PRIMARY KEY (`idLivroTemAutor`),
  FOREIGN KEY (`idAutor`) REFERENCES `Autor` (`idAutor`),
  FOREIGN KEY (`idLivro`) REFERENCES `Livros` (`idLivro`)
  );


-- -----------------------------------------------------
-- Table `mydb`.`Tradutor_has_Livros`
-- -----------------------------------------------------
CREATE TABLE `Tradutor_has_Livros` (
  `idLivroTemTradutor` INT NOT NULL AUTO_INCREMENT,
  `idTradutor` INT NOT NULL,
  `idLivro` INT NOT NULL,
  PRIMARY KEY (`idLivroTemTradutor`),
  FOREIGN KEY (`idTradutor`) REFERENCES `Tradutor` (`idTradutor`),
  FOREIGN KEY (`idLivro`) REFERENCES `Livros` (`idLivro`)
  );


-- -----------------------------------------------------
-- Table `mydb`.`Genero_has_Livros`
-- -----------------------------------------------------
CREATE TABLE `Genero_has_Livros` (
  `idLivroTemGenero` INT NOT NULL AUTO_INCREMENT,
  `idGenero` INT NOT NULL,
  `idLivro` INT NOT NULL,
  PRIMARY KEY (`idLivroTemGenero`),
  FOREIGN KEY (`idGenero`) REFERENCES `Genero` (`idGenero`),
  FOREIGN KEY (`idLivro`) REFERENCES `Livros` (`idLivro`)
  );
  
 CREATE TABLE `Historico_Usuario_Livros` (
  `idHistorico` INT NOT NULL AUTO_INCREMENT,
  `tipo_interacao` ENUM('Lido', 'Favoritado', 'Pesquisado', 'Avaliado') NOT NULL,
  `idLivro` INT NOT NULL,
  `idCadastroFuncionarios` INT,
  `idUsuario` INT,
  `idCadastroBibliotecarias` INT,
  `nota_avaliacao` INT,
  `avaliacao` TEXT,
  `createdAt` TIMESTAMP NULL,
  `updatedAt` TIMESTAMP NULL,
  PRIMARY KEY (`idHistorico`),
  FOREIGN KEY (`idLivro`) REFERENCES `Livros` (`idLivro`),
  FOREIGN KEY (`idUsuario`) REFERENCES `CadastroAlunos` (`idUsuario`),
  FOREIGN KEY (`idCadastroFuncionarios`) REFERENCES `CadastroFuncionarios` (`idCadastroFuncionarios`),
  FOREIGN KEY (`idCadastroBibliotecarias`) REFERENCES `CadastroBibliotecarias` (`idCadastroBibliotecarias`)
  );
  
 

INSERT INTO Autor(nome_autor) VALUE ("José de Alencar"),("Guimarães Rosa"),("Ailton Krenak"),("Machado de Assis"),("Clarice Lispector");

INSERT INTO Tradutor(nome_tradutor) VALUE ("Jório Dauster"),("Silvia Massimini Felix");

INSERT INTO UF (uf) VALUES 
('AC'), ('AL'), ('AP'), ('AM'), ('BA'), ('CE'), ('DF'), ('ES'), ('GO'), 
('MA'), ('MT'), ('MS'), ('MG'), ('PA'), ('PB'), ('PR'), ('PE'), ('PI'), 
('RJ'), ('RN'), ('RS'), ('RO'), ('RR'), ('SC'), ('SP'), ('SE'), ('TO');

INSERT INTO Editora (nome_editora) VALUES ('Companhia das Letras'), ('Intrínseca');

INSERT INTO Genero (nome_genero) VALUES ('Romance'), ('Ficção Científica');

INSERT INTO Categoria (nome_categoria) VALUES ('Kits'), ('Notebooks'), ('Controle remoto'), ('Microfone'), ('Rádio portátil'), ('Cabo HDMI'), ('Adaptadores');

INSERT INTO Turmas (turma) VALUES ('1NTI'), ('2NTI'), ('3NTI');

INSERT INTO tipoUsuarios (tipo_usuario) VALUES ('Professor'), ('Secretário'),('Coordenador'), ('Vice-Diretor'), ('Diretor'), ('Supervisor'), ('Financeiro'), ('ASBs'), ('RH'), ('Secretaria');

INSERT INTO Material(nome, createdAt, idCategoria) VALUES ("Kit informática", NOW(), 1);

INSERT INTO itensAcompanham(idMaterial,item) VALUES (1,"Controle do Ar"),(1,"Controle do Projetor");

INSERT INTO CadastroBibliotecarias (nome_bibliotecaria, email, senha_hash, createdAt) VALUES ('Rubia', 'rubia@biblioteca.com','$2a$12$hashExemplo',  NOW());

INSERT INTO CadastroAlunos (ra, nome, email, telefone, senha_hash, aceitou_termo, aceitou_notificacoes, aceitou_novidades, createdAt, idTurmas)
VALUES (12345, 'Lucas Oliveira', 'lucas@email.com', '11999998888', '$2a$12$hashExemplo', 1, 1, 0, NOW(), 1),
(54321, 'Dierrisson Wagner', 'dierrisson@email.com', '1122228888', '$2a$12$hashExemplo', 1, 1, 1, NOW(), 2);

INSERT INTO CadastroFuncionarios (ra, nome, email, telefone, senha_hash, aceitou_termo, aceitou_notificacoes, aceitou_novidades, createdAt, idtipoUsuarios)
VALUES (67890, 'Carlos Souza', 'carlos@escola.com', '11988887777', '$2a$12$hashExemplo', 1, 1, 1, NOW(), 1),
(11111, 'Sandra', 'sandra@escola.com', '11988884444', '$2a$12$hashExemplo', 1, 1, 1, NOW(), 2);

INSERT INTO Livros (numero, titulo, edicao, ano, numero_paginas, quantidade, descricao, capa_url, status, createdAt, idEditora, idUF)
VALUES ('1000/26', 'Dom Casmurro', 1, 1899, 256, 3, 'Romance clássico', 'https://capas.com/domcasmurro.jpg', 1, NOW(), 1, 1),
('1001/26', 'Capitães de Areia', 1, 1899, 256, 3, 'Romance clássico', 'https://capas.com/capitaesdeareia.jpg', 0, NOW(), 2, 3);

INSERT INTO Livros (numero, titulo, edicao, ano, numero_paginas, quantidade, descricao, capa_url, status, createdAt, idEditora, idUF)
VALUES 
('1002/26', 'Grande Sertão: Veredas', 1, 1956, 600, 2, 'Clássico da literatura brasileira', 'https://capas.com/grandesertao.jpg', 1, NOW(), 1, 3),
('1003/26', 'Ideias para Adiar o Fim do Mundo', 1, 2019, 104, 5, 'Ensaio contemporâneo', 'https://capas.com/krenak.jpg', 1, NOW(), 1, 1);

INSERT INTO Autor_has_Livros (idAutor, idLivro) VALUES (4, 1),(1,2);

INSERT INTO Genero_has_Livros (idGenero, idLivro) VALUES (1, 1),(1,2);

INSERT INTO Tradutor_has_Livros (idTradutor, idLivro) VALUES (1,2);

INSERT INTO emprestimoLivro ( data_emprestimo, data_devolucao_prevista, status_emprestimo, createdAt, idCadastroBibliotecarias, idUsuario, idLivro)
VALUES (CURDATE(), DATE_ADD(CURDATE(), INTERVAL 7 DAY), 'Ativo', NOW(), 1, 1, 1),
(CURDATE(), DATE_ADD(CURDATE(), INTERVAL 7 DAY), 'Atrasado', NOW(), 1, 2, 2);
INSERT INTO emprestimoLivro ( data_emprestimo, data_devolucao_prevista, status_emprestimo, createdAt, idCadastroBibliotecarias, idCadastroFuncionarios, idLivro)
VALUES (CURDATE(), DATE_ADD(CURDATE(), INTERVAL 7 DAY), 'Atrasado', NOW(), 1, 1, 1);

INSERT INTO emprestimoLivro (data_emprestimo, data_devolucao_prevista, status_emprestimo, createdAt, idCadastroBibliotecarias, idUsuario, idLivro)
VALUES 
(CURDATE(), DATE_ADD(CURDATE(), INTERVAL 7 DAY), 'Ativo', NOW(), 1, 1, 1),
(CURDATE(), DATE_ADD(CURDATE(), INTERVAL 7 DAY), 'Ativo', NOW(), 1, 1, 2),
(CURDATE(), DATE_ADD(CURDATE(), INTERVAL 7 DAY), 'Ativo', NOW(), 1, 2, 3);

INSERT INTO Historico_Usuario_Livros (tipo_interacao, idLivro, idUsuario, idCadastroFuncionarios, nota_avaliacao, avaliacao, createdAt)
VALUES 
('Lido', 1, 1, NULL, 5, 'Excelente obra! Muito instigante.', NOW()),
('Lido', 1, 2, NULL, 4, 'Muito bom, a dúvida sobre Capitu continua.', NOW()),
('Lido', 1, NULL, 1, 5, 'Um clássico indispensável para a literatura.', NOW()),
('Lido', 2, 1, NULL, 3, 'Boa leitura, retrata bem a época.', NOW()),
('Favoritado', 3, 2, NULL, NULL, NULL, NOW()),
('Lido', 4, 1, NULL, 5, 'Leitura essencial e reflexão urgente!', NOW());

-- LIVRO
SELECT 
    L.idLivro,
    L.titulo,
    E.nome_editora,
    A.nome_autor,
    U.uf,
    T.nome_tradutor,
    G.nome_genero
FROM Livros L
LEFT JOIN Editora E ON L.idEditora = E.idEditora
LEFT JOIN UF U ON L.idUF = U.idUF
LEFT JOIN Autor_has_Livros AL ON L.idLivro = AL.idLivro
LEFT JOIN Autor A ON AL.idAutor = A.idAutor
LEFT JOIN Tradutor_has_Livros TL ON L.idLivro = TL.idLivro
LEFT JOIN Tradutor T ON TL.idTradutor = T.idTradutor
LEFT JOIN Genero_has_Livros GL ON L.idLivro = GL.idLivro
LEFT JOIN Genero G ON GL.idGenero = G.idGenero;

-- USUARIOS
SELECT
	A.*,
    T.turma
FROM CadastroAlunos A
LEFT JOIN Turmas T ON A.idTurmas = T.idTurmas;

SELECT
	F.*,
    T.tipo_usuario
FROM CadastroFuncionarios F
LEFT JOIN tipoUsuarios T  ON F.idtipoUsuarios = T.idtipoUsuarios;

-- Material
SELECT 
	M.nome,
    C.nome_categoria,
    I.item
FROM Material M
LEFT JOIN Categoria C ON M.idCategoria = C.idCategoria
LEFT JOIN itensAcompanham I ON M.idMaterial = I.idMaterial;

-- Livros atrasados
SELECT 
    EL.idEmprestimoLivro,
    COALESCE(AL.nome, F.nome) AS nome_usuario,
    COALESCE(T.turma, TP.tipo_usuario) AS tipo_ou_turma,
    L.titulo AS livro,
    EL.data_emprestimo,
    EL.data_devolucao_prevista,
    EL.status_emprestimo,
    B.nome_bibliotecaria
FROM emprestimoLivro EL
LEFT JOIN CadastroAlunos AL ON EL.idUsuario = AL.idUsuario
LEFT JOIN Turmas T ON AL.idTurmas = T.idTurmas
LEFT JOIN CadastroFuncionarios F ON EL.idCadastroFuncionarios = F.idCadastroFuncionarios
LEFT JOIN tipoUsuarios TP  ON F.idtipoUsuarios = TP.idtipoUsuarios
LEFT JOIN Livros L ON EL.idLivro = L.idLivro
LEFT JOIN CadastroBibliotecarias B ON EL.idCadastroBibliotecarias = B.idCadastroBibliotecarias
WHERE EL.status_emprestimo = 'Atrasado';

-- Livros atrasados por usuario
SELECT 
    EL.idEmprestimoLivro,
    AL.nome AS nome_aluno,
    T.turma,
    L.titulo AS livro,
    EL.data_emprestimo,
    EL.data_devolucao_prevista,
    EL.status_emprestimo
FROM emprestimoLivro EL
LEFT JOIN CadastroAlunos AL ON EL.idUsuario = AL.idUsuario
LEFT JOIN Turmas T ON AL.idTurmas = T.idTurmas
LEFT JOIN Livros L ON EL.idLivro = L.idLivro
LEFT JOIN CadastroBibliotecarias B ON EL.idCadastroBibliotecarias = B.idCadastroBibliotecarias
WHERE EL.status_emprestimo = 'Atrasado' AND AL.nome = "Dierrisson Wagner";
    


-- Controle de Estoque

SELECT 
    L.titulo,
    L.quantidade AS estoque_total,
    COUNT(EL.idEmprestimoLivro) AS em_uso,
    (L.quantidade - COUNT(EL.idEmprestimoLivro)) AS disponiveis
FROM Livros L
LEFT JOIN emprestimoLivro EL ON L.idLivro = EL.idLivro AND EL.status_emprestimo = 'Ativo'
GROUP BY L.idLivro, L.titulo, L.quantidade;

-- Média de Avaliações

SELECT 
    L.titulo,
    ROUND(AVG(H.nota_avaliacao), 1) AS media_notas,
    COUNT(H.idHistorico) AS total_avaliacoes
FROM Historico_Usuario_Livros H
JOIN Livros L ON H.idLivro = L.idLivro
WHERE H.nota_avaliacao IS NOT NULL
GROUP BY L.idLivro, L.titulo;

SELECT idEmprestimoLivro, data_devolucao_prevista FROM emprestimoLivro WHERE data_devolucao_real IS NULL;
SELECT COUNT(idEmprestimoLivro) FROM emprestimoLivro WHERE idLivro = 5 AND data_devolucao_real IS NULL;
SELECT MIN(data_devolucao_prevista) AS data_disponivel FROM emprestimoLivro WHERE idLivro = 1 AND data_devolucao_real IS NULL;

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
