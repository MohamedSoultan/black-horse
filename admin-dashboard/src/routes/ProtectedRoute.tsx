import {Navigate,useLocation} from 'react-router-dom';import {useAuth} from '../store/auth';
export function ProtectedRoute({children,role}:{children:React.ReactNode;role?:string}){const {user,can}=useAuth();const loc=useLocation();if(!user)return <Navigate to="/login" state={{from:loc}} replace/>;if(role&&!can(role))return <Navigate to="/forbidden" replace/>;return <>{children}</>}
