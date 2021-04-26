export class Checker {
    constructor(){
        this.error = null;
    }
    isAlphaNum(str){
        if(str.match(/^[A-Za-z0-9-@-_-\s-.]*$/)){
            return true;
        }
        this.error.isAlphaNum = "Seuls lescaractères alphanumeriques,@,espace,underscore,et le point :) sont authorisés!";
            return false;
    }
    isHexadecimal(str){
        if(str.match(/^((0x){0,1}|#{0,1})([0-9A-F]{8}|[0-9A-F]{6})$/ig)){
            return true;
        }
        this.error.isHexadecimal = "la chaine de caractère n'est pas hexadécimale";
        return false;
    }

    isValidHtmlDate(str){
        if(str.match(/([0-9]{4})-([0-9]{2})-([0-9]{2})/g)){
            return true;
        }
        this.error.isValidHtmlDate = "Le format de date doit çetre sous la forme : aaaa/mm/jj ";
        return false;
    }
    isEmpty(str = null) {
        console.log(str);
        if(str != "" || str !== null) {
            return false;
        } else {
            this.error.isEmpty = "Le champ ne doit pas être vide!";
            return true;
        }
        
    }
}