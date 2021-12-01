package designpattern;
import java.util.Scanner;
public class MI extends CellPhone{
	Scanner sc=new Scanner(System.in);
	public void menu() {
		System.out.println();
		System.out.println("1.mms\n2.sms\n3.Phone Dial\n4.Mi Pay\n5.About");
		System.out.println();
		System.out.print("enter your choice[1-5]:");
		int choice=sc.nextInt();
	
	
		
		switch(choice) {
		case 1:
			this.mms();
			break;
		case 2:
			this.sms();
			break;
		case 3:
			this.phoneDial();
			break;
		case 4:
			PayApp pay=PayApp.getObject();
			pay.payApp();
			break;
		case 5:
			this.about();
			break;
		
		default:
			System.out.println("You have entered wrong choice,"
					+ "Plsease enter valid choice");
		}


	}
	public void about() {
		System.out.println("Device: Xiomi Mi Ultra\nScreen: 6.80(1440 X 3200)"
				+ "\nCamera feature: Triple\nRear Camera: 50 + 48 + 48 MP\n"
				+ "Front Camera: 20 MP\nMemory: 256 GB \nRAM: 12 GB\n"
				+ "Battery: 5000mAh");
	}

}
