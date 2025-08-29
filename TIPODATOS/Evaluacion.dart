
import 'dart:io';

// Constante para definir la nota mínima de aprobación
const double PROMEDIO_APROBACION = 13.0;

// Creamos una clase para agrupar los datos de un alumno
class Alumno {
  String nombre;
  double promedio;

  // Constructor de la clase
  Alumno(this.nombre, this.promedio);
}

// Lista global para almacenar los objetos de tipo Alumno
List<Alumno> listaAlumnos = [];

// Método principal de la aplicación
void main() {
  mostrarMenu();
}

// Función para mostrar el menú de opciones
void mostrarMenu() {
  int opcion = -1;
  while (opcion != 0) {
    print("\n--- Sistema de Gestión de Alumnos ---");
    print("1 => Ingresar datos de un alumno");
    print("2 => Mostrar listado de alumnos y su estado");
    print("3 => Calcular promedio general de la clase");
    print("0 => Salir");
    stdout.write("Seleccione una opción: ");
    try {
      opcion = int.parse(stdin.readLineSync().toString());
      switch (opcion) {
        case 1:
          ingresarDatosAlumno();
          break;
        case 2:
          mostrarListadoAlumnos();
          break;
        case 3:
          calcularPromedioGeneral();
          break;
        case 0:
          print("Cerrando la aplicación...");
          break;
        default:
          print("Opción no válida.");
      }
    } catch (e) {
      print("Entrada no válida. Por favor, ingrese un número.");
      opcion = -1;
    }
  }
}

// Función para ingresar los datos de un alumno
void ingresarDatosAlumno() {
  stdout.write("\nIngrese el nombre del alumno: ");
  String nombre = stdin.readLineSync().toString().trim();

  // Validar que el nombre no esté vacío
  if (nombre.isEmpty) {
    print("El nombre no puede estar vacío.");
    return;
  }

  double promedio;
  while (true) {
    stdout.write("Ingrese el promedio general: ");
    try {
      promedio = double.parse(stdin.readLineSync().toString());
      // Validar que el promedio esté en un rango lógico
      if (promedio < 0 || promedio > 20) {
        print("El promedio debe estar entre 0 y 20.");
      } else {
        break;
      }
    } catch (e) {
      print("Entrada no válida. Por favor, ingrese un número decimal.");
    }
  }

  // Crear una nueva instancia de Alumno y agregarla a la lista
  Alumno nuevoAlumno = Alumno(nombre, promedio);
  listaAlumnos.add(nuevoAlumno);

  print("¡Datos de $nombre guardados exitosamente!");
}

// Función para mostrar el listado de alumnos y su estado
void mostrarListadoAlumnos() {
  if (listaAlumnos.isEmpty) {
    print("\nNo hay alumnos registrados aún.");
    return;
  }

  print("\n--- Listado de Alumnos ---");
  for (var alumno in listaAlumnos) {
    // Usamos el operador ternario para determinar si el alumno está aprobado o desaprobado
    String estado = (alumno.promedio >= PROMEDIO_APROBACION) ? "Aprobado" : "Desaprobado";
    print("Alumno: ${alumno.nombre} | Promedio: ${alumno.promedio.toStringAsFixed(2)} | Estado: $estado");
  }
}

// Función para calcular y mostrar el promedio general de todos los alumnos
void calcularPromedioGeneral() {
  if (listaAlumnos.isEmpty) {
    print("\nNo hay alumnos para calcular el promedio.");
    return;
  }

  double sumaPromedios = 0;
  for (var alumno in listaAlumnos) {
    sumaPromedios += alumno.promedio;
  }

  double promedioGeneral = sumaPromedios / listaAlumnos.length;

  print("\n--- Promedio General ---");
  print("El promedio general de todos los alumnos es: ${promedioGeneral.toStringAsFixed(2)}");
}