public class Prueba2 {
    public static void main(String[] args) {
        
        int primos = 0;
        int x = 0;
        int y = 1;

        System.out.print("Introduzca la cantidad de primos: ");
        primos = Integer.parseInt(System.console().readLine());

        System.out.println();

        if (primos == 1){
            System.out.println("1");
        } else {

            do {

            boolean primo = true;

            for (int i = 2; i < y; i++){
            
                if(y % i == 0) {
                    primo = false;
                }
            }

            if (primo == true && y == 1){

                System.out.print(y);
                y++;
                x++;

            }else if (primo == true && y != 1){

                System.out.print(", " + y);
                y++;
                x++;

            } else {
                
                y++;
            }

        } while (x < primos);
        }

        System.out.println();
    }
}
