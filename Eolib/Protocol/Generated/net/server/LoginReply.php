<?php
/**
 * Generated from the eo-protocol XML specification.
 *
 * This file should not be modified.
 * Changes will be lost when code is regenerated.
 */

namespace Eolib\Protocol\Generated\Net\Server;

class LoginReply {
    const WRONGUSER = 1;
    const WRONGUSERPASSWORD = 2;
    const OK = 3;
    const BANNED = 4;
    const LOGGEDIN = 5;
    const BUSY = 6;
}
