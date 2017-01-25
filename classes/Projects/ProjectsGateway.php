<?php
namespace phpCollab\Projects;

use phpCollab\Database;


/**
 * Class ProjectsGateway
 * @package phpCollab\Projects
 */
class ProjectsGateway
{
    protected $db;
    protected $projectsFilter;
    protected $initrequest;
    protected $tableCollab;

    /**
     * Reports constructor.
     * @param Database $db
     */
    public function __construct(Database $db)
    {
        $this->db = $db;
        $this->projectsFilter = $GLOBALS['projectsFilter'];
        $this->initrequest = $GLOBALS['initrequest'];
        $this->tableCollab = $GLOBALS['tableCollab'];
    }

    /**
     * Returns a list of projects owned by ownerId
     * @param $ownerId
     * @param $sorting
     * @internal param $inactive
     */
    public function getAllByOwner($ownerId, $sorting = null)
    {
        $this->db->query($this->initrequest['teams'] . ' WHERE tea.member = :owner_id AND pro.status IN(2,3) ' . $this->orderBy($sorting));

        $this->db->bind(':owner_id', $ownerId);

        return $this->db->resultset();
    }

    /**
     * @param $orgId
     * @param $memberId
     * @param $sorting
     * @return mixed
     */
    public function getFilteredAllByOrganization($orgId, $memberId, $sorting = null)
    {

        $tmpquery = " LEFT OUTER JOIN {$this->tableCollab["teams"]} teams ON teams.project = pro.id";
        $tmpquery .= " WHERE pro.organization = :org_id AND teams.member = :member_id";

        $this->db->query($this->initrequest['projects'] . $tmpquery . $this->orderBy($sorting));

        $this->db->bind(':org_id', $orgId);
        $this->db->bind(':member_id', $memberId);

        return $this->db->resultset();
    }

    /**
     * @param $orgId
     * @param $sorting
     * @return mixed
     */
    public function getAllByOrganization($orgId, $sorting = null)
    {

        $tmpquery = " WHERE pro.organization = :org_id";

        $this->db->query($this->initrequest['projects'] . $tmpquery . $this->orderBy($sorting));

        $this->db->bind(':org_id', $orgId);

        return $this->db->resultset();
    }

    /**
     * @param $ownerId
     * @param $typeProjects
     * @param $sorting
     * @return
     */
    public function getProjectList($ownerId, $typeProjects, $sorting = null)
    {
        $tmpQuery = '';
        if ($typeProjects == "inactive") {
            if ($this->projectsFilter == "true") {
                $tmpQuery = "LEFT OUTER JOIN teams ON teams.project = pro.id ";
                $tmpQuery .= " WHERE pro.status IN(0,1,4) AND teams.member = :owner_id";
            } else {
                $tmpQuery = "WHERE pro.status IN(0,1,4)";
            }
        } else if ($typeProjects == "active") {
            if ($this->projectsFilter == "true") {
                $tmpQuery = "LEFT OUTER JOIN teams teams ON teams.project = pro.id ";
                $tmpQuery .= "WHERE pro.status IN(2,3) AND teams.member = :owner_id";
            } else {
                $tmpQuery = "WHERE pro.status IN(2,3)";
            }
        }

        $query = $this->initrequest["projects"] . ' ' . $tmpQuery . $this->orderBy($sorting);

        $this->db->query($query);

        $this->db->bind(':owner_id', $ownerId);

        return $this->db->resultset();
    }

    /**
     * @param $projectId
     * @return mixed
     */
    public function getProjectById($projectId)
    {
        $whereStatement = ' WHERE pro.id = :project_id';
        $this->db->query($this->initrequest['projects'] . $whereStatement);
        $this->db->bind(':project_id', $projectId);
        return $this->db->single();
    }

    /**
     * @param $orgId
     * @return mixed
     */
    public function setDefaultOrg($orgId)
    {
        $orgId = explode(',', $orgId);
        $placeholders = str_repeat('?, ', count($orgId) - 1) . '?';
        $sql = "UPDATE {$this->tableCollab['projects']} SET organization=1 WHERE organization IN ($placeholders)";
        $this->db->query($sql);
        return $this->db->execute($orgId);

    }

    /**
     * @param $sorting
     * @return string
     */
    private function orderBy($sorting)
    {
        if (!is_null($sorting)) {
            $allowedOrderedBy = ["tea.id", "tea.project", "tea.member", "tea.published", "tea.authorized", "mem.id", "mem.login", "mem.name", "mem.email_work", "mem.title", "mem.phone_work", "org.name", "pro.id", "pro.name", "pro.priority", "pro.status", "pro.published", "org2.name", "mem2.login", "mem2.email_work", "org2.id", "log.connected", "mem.profil", "mem.password"];
            $pieces = explode(' ', $sorting);

            if ($pieces) {
                $key = array_search($pieces[0], $allowedOrderedBy);

                if ($key !== false) {
                    $order = $allowedOrderedBy[$key];
                    return " ORDER BY $order $pieces[1]";
                }
            }
        }

        return '';
    }
}
