<%
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.1.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
%>

    /**
     * Login method
     *
     * @return \Cake\Network\Response|void
     */
    public function login()
    {
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();

            $group = $user['group_id'];

            if ($user && ($group == 3 || $group == 4)) {
                $this->Auth->setUser($user);
		return $this->redirect(['controller'=>$this->noAdmins,'action' => 'index']);
	    }else{
                $this->Auth->setUser($user);
		return $this->redirect($this->Auth->redirectUrl());                
            }
            $this->Flash->error(__('Login ou senha inválidos, tente novamente'));
        }
    }
