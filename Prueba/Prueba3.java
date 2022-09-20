public class Prueba3 {
    public static void main(String[] args) {
        
        int [] numeros;
        int i = 0;
        int mayor = 0;
        int z = 0;

        numeros = new int[10];


        do {
            System.out.print("Introduzca numeros: ");
            i = Integer.parseInt(System.console().readLine());

            if (i >= 0 && i <= 9) {
            numeros[i] = numeros[i] + 1;
        }

        } while (i >= 0);


        for (int x = 1; x < numeros.length; x++) {
            if (numeros[z] < numeros[x]) {
                mayor = x;
                z = x;
            }
        }

        System.out.println();

        for (int s = mayor ; s >= 0; s--) {

        if (s == 0) {
            System.out.print("0 1 2 3 4 5 6 7 8 9");
        } else {
            
            for (int t = 0 ; t < 10 ; t++) {

                if (numeros[t] == mayor){
                 
                 numeros[t] -= 1;
                 System.out.print("* ");

                } else {

                    System.out.print("  ");
                }
            }

            System.out.println();
            mayor -= 1;
        }
    }
        System.out.println();
    }
}
