CREATE database prueba ;

CREATE TABLE appx_educationlevel (
  id INT NOT NULL AUTO_INCREMENT,
  description VARCHAR(45) NULL,
  PRIMARY KEY (id));

CREATE TABLE appx_department (
  id INT NOT NULL AUTO_INCREMENT,
  department_name VARCHAR(45) NULL,
  department_city VARCHAR(45) NULL,
  PRIMARY KEY (id));

CREATE TABLE appx_employee (
  id INT NOT NULL AUTO_INCREMENT,
  firstname VARCHAR(45) NULL,
  lastname VARCHAR(45) NULL,
  department_id INT NULL,
  salary INT NULL,
  educationlevel_id INT NULL,
  PRIMARY KEY (id),
  INDEX employee_department_idx (department_id, ASC),
  INDEX employee_educationlevel_idx (educationlevel_id ASC),
  CONSTRAINT employee_department
    FOREIGN KEY (department_id)
    REFERENCES appx_department (id)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT employee_educationlevel
    FOREIGN KEY (educationlevel_id)
    REFERENCES appx_educationlevel (id)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);

INSERT INTO appx_department (department_name, department_city) VALUES ('cundinamarca', 'bogota');
INSERT INTO appx_department (department_name, department_city) VALUES ('cundinamarca', 'chia');
INSERT INTO appx_department (department_name, department_city) VALUES ('cundinamarca', 'mosquera');

INSERT INTO appx_educationlevel (description) VALUES ('profesional');
INSERT INTO appx_educationlevel (description) VALUES ('tecnico');
INSERT INTO appx_educationlevel (description) VALUES ('bachiller');
INSERT INTO appx_educationlevel (description) VALUES ('especializacion');

INSERT INTO appx_employee (firstname, lastname, department_id, salary, educationlevel_id) VALUES ('andres', 'alvarez', '1', '1300000', '1');
INSERT INTO appx_employee (firstname, lastname, department_id, salary, educationlevel_id) VALUES ('carlos', 'sierra', '2', '2500000', '2');
INSERT INTO appx_employee (firstname, lastname, department_id, salary, educationlevel_id) VALUES ('diana patricia', 'perea', '3', '1800000', '3');
