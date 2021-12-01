package designpattern;

public class FactoryDesignPattern {
	public CellPhone getObject(int object) {
		if(object==0) {
			return null;
		}
		if(object==1) {
			return new Samsung();
		}
		else if(object==2) {
			return new Nokia();
		}
		else if(object==3) {
			return new MI();
		}else if(object==4) {
			return new Apple();
		}else if(object==5) {
			return new OPPO();
		}else if(object==6) {
			return new Asus();
		}else if(object==7) {
			return new Vivo();
		}
		return null;
		
	}

}
