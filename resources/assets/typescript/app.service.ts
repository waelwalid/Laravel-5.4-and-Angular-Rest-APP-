import {Injectable} from '@angular/core';
import {Http,Headers,RequestOptions,Response} from '@angular/http' ;
import {Observable} from 'rxjs/Rx';
import 'rxjs/add/operator/map' ;
import 'rxjs/add/operator/catch';


@Injectable()

export class AppService{
    users:any ;
    tokenParams = { email: "wael.walid91@gmail.com", password: '123456' };
    constructor(private _http: Http){
        this.users = "wael" ;
    }

    // Make Api Authorization (Get Token)
    authenticate(){
        let headers = new Headers();
        headers.append('Content-Type', 'application/json');
        headers.append('Access-Control-Allow-Origin','*');
        return this._http.post('/api/token_auth',JSON.stringify(this.tokenParams),{headers:headers}).map(res=>res.json());
    }

    creatAuthHeader(headers: Headers , token){
        headers.append('Content-Type', 'application/json');
        headers.append('Access-Control-Allow-Origin','*');
        headers.append('Authorization' , token);
    }

    getUsers(token){
        let headers = new Headers();
        this.creatAuthHeader(headers,token);
        return this._http.get('/api/users',{headers:headers}).map(res=>res.json());
    }

    getUser(token,url){
        let headers = new Headers();
        this.creatAuthHeader(headers,token);
        return this._http.get(url,{headers:headers}).map(res=>res.json());
    }

}
